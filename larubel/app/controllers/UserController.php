<?php

namespace App\Controllers;

use Larubel\Database\Bond;

use App\Model\User;

use Larubel\Libs\Services\Session;

use Larubel\Core\Authentication\Auth;

class UserController extends Controller{

    public function getLogin(){
        echo $this->view->render('/users/login');
    }

    public function postLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = Auth::attempt($email, $password);

        if($user){
            echo $this->view->render('/users/index', compact('user'));
        }else{
            echo $this->view->render('/users/login');
        }
        
    }

    public function show(){

    }

    public function create(){

    }

    public function update(){

    }

    public function destroy(){

    }

}