<?php

namespace App\widgets;

use App\components\View;
use Micro\mvc\Widget;

class MenubarWidget extends Widget
{
    public function init()
    {
    }

    public function run()
    {
        $view = new View($this->container);
        //$view->addParameter('menu', $this->links);
        $view->view = 'menubar';
        $view->asWidget = true;

        return $view;
    }
}