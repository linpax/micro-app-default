<?php

namespace App\Models;

use Micro\Form\FormModel;
use Micro\Mvc\Models\Query;

class LoginFormModel extends FormModel
{
    public $login;
    public $password;

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль'
        ];
    }

    public function rules()
    {
        return [
            // Web security
            ['login, password', 'trim'],
            ['login, password', 'strip_tags'],
            ['login, password', 'htmlspecialchars'],
            // check value elements
            ['login', 'string', 'min' => 5, 'max' => 16],
            ['password', 'string', 'min' => 6, 'max' => 32]
        ];
    }

    public function logined()
    {
        $query = new Query($this->container->db);
        $query->addWhere('login = :login');
        $query->addWhere('pass = :pass');

        $query->params = [
            'login' => $this->login,
            'pass' => md5($this->password)
        ];

        if ($user = User::finder($query, true)) {
            $this->container->session->UserID = $user->id;

            return true;
        } else {
            $this->addError('Логин или пароль не верны.');

            return false;
        }
    }
}
