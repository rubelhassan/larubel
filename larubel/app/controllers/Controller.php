<?php

namespace App\Controllers;

use Larubel\Core\View\View;

use Larubel\Core\View\Loader;

use Larubel\Libs\Services\Validator;

class Controller{

    protected $view;

    protected $validator;
    
    public function __construct(){

        $this->view = new View(
            new Loader(BASEPATH . '/app/views/')
        );

        $this->validator = new Validator();
    }
}