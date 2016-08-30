<?php

namespace App\Controllers;

use Larubel\Database\Bond;

use App\Model\Post;

use Larubel\Libs\Services\Session;

use Larubel\Core\Authentication\Auth;

class PostController extends Controller{

    public function index(){
        if(Auth::check())
            echo "user is logged in";
        die();


        $posts = Bond::all('App\\Model\\Post');
        echo $this->view->render('posts', compact('posts'));
    }

    public function show($id){
        $posts = Bond::find('App\\Model\\Post' , $id);
        if($posts instanceof Post){
            echo "string";
        }
        var_dump($posts);
        die();
        echo $this->view->render('posts', compact('posts'));
    }

}