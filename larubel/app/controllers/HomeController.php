<?php

namespace App\Controllers;

class HomeController extends Controller{

    public function index(){

        echo $this->view->render('home');
    }

    public function post(){

        $name = $_POST["name"];
        $this->view->setData($name);
        echo $this->view->render('person', compact('name'));
    }

    public function show($id){
        echo "Welcome!" . $id ;
    }

    public function hola($request = []){
        echo "home" . $request['home'] . '<br>';
        echo "post" . $request['post'] . '<br>';
        echo "rubel" . $request['rubel'] . '<br>';
    }
}