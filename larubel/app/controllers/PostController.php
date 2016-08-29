<?php

namespace App\Controllers;

use Larubel\Database\Bond;

class PostController extends Controller{

    public function index(){
        $posts = Bond::all('App\\Model\\Post');
        echo $this->view->render('posts', compact('posts'));
    }

    public function show($id){
        $posts = Bond::find('App\\Model\\Post' , $id);
        echo $this->view->render('posts', compact('posts'));
    }

}