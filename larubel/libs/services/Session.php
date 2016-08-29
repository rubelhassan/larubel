<?php

namespace Larubel\Libs\Services;

class Session{

    public static function set($name, $data){
        $_SESSION[$name] = $data;
    }   

    public static function get($name){

        if(isset($_SESSION[$name]))
            return $_SESSION[$name];

        return null; 
    }

    public static function start(){
        session_start();
    }  

    public static function delete($name){
        unset($_SESSION[$name]);
    }
}