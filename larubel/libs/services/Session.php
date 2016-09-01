<?php

namespace Larubel\Libs\Services;

class Session{

    public static function set($name, $data){
        $_SESSION[$name] = $data;
        $_SESSION['activity'] = time();
    }   

    public static function get($name){
        if(isset($_SESSION['activity']))
            if( (time() - $_SESSION['activity']) > 1800){
                session_unset();
                session_destroy();
                return null;
            }

        if(isset($_SESSION[$name]))
            return $_SESSION[$name];

        return null; 
    }

    public static function start(){

        @session_start(); 

        if(!isset($_SESSION['activity']))
            $_SESSION['activity'] = time();
    }  

    public static function delete($name){
        unset($_SESSION[$name]);
    }
}