<?php

namespace App\components;

use Micro\base\IContainer;
use Micro\mvc\views\PhpView;

class View extends PhpView
{
    public $title = 'Micro';
    public $menu = ['<a href="/">Главная</a>', '<a href="/blog/post">Блог</a>'];

    public function __construct(IContainer $container)
    {
        parent::__construct($container);

        if (!$this->container->user->isGuest()) {
            $this->menu[] = '<a href="/profile">Профиль</a>';
            $this->menu[] = ' (<a href="/logout">Выйти</a>)';
        } else {
            $this->menu[] = '<a href="/login">Войти</a>';
            $this->menu[] = '<a href="/register">Регистрация</a>';
        }
    }
} 
