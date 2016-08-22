<?php

namespace App\Controllers;

use Larubel\Core\View\View as View;
use Larubel\Core\View\Loader as Loader;

class Controller{

    protected $view;

    public function __construct(){
        $this->view = new View(
            new Loader(BASEPATH . '/app/views/')
        );
    }
}