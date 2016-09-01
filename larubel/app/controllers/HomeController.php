<?php

namespace App\Controllers;

class HomeController extends Controller{

    public function index(){
        echo $this->view->render('index');
    }

    public function showSingle(){
        echo $this->view->render('single');
    }
}