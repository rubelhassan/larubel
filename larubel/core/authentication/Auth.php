<?php 

namespace Larubel\Core\Authentication;

use Larubel\Database\Bond;

use Larubel\Libs\Services\Session;

class Auth{

    /**
     * attempt to find and login an user
     */
    public static function attempt($email, $password){

        $user = Bond::findWhere('App\\Model\\User', [
            'email' => $email, 
            'password' => $password
        ], 1);
        
        if($user){
            $user = current($user);
            Session::set('user', $user);
            return $user;
        }

        Session::delete('user');
        return $user;
    }

    /**
     * check if current user is logged in
     */
    public function check(){
        if(Session::get('user'))
            return true;

        return false;
    }
}