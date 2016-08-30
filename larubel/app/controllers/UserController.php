<?php

namespace App\Controllers;

use Larubel\Database\Bond;

use App\Model\User;

use Larubel\Libs\Services\Session;

use Larubel\Core\Authentication\Auth;

use Larubel\Libs\Services\Request;

class UserController extends Controller{

    public function getLogin(){
        echo $this->view->render('/users/login');
    }

    public function postLogin(Request $request){

        $password = $request->get('password'); echo "</br>";
        $email =  $request->get('email');

        $this->validator->validate('required', ['password' => $password]);
        $this->validator->validate('required|email', ['email' => 'rubelhassan@outlook.com']);


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