<?php

namespace Larubel\Libs\Services;

class Request{

    private $postParams;

    private $files;

    public function __construct(){
        $this->postParams = $_POST ? $_POST : [];
        $this->file = $_FILES ? $_FILES : [] ;
    }

    public function get($name){
        if(array_key_exists($name, $this->postParams)){
            return $this->postParams[$name];
        }

        return null;
    }

    public function file($name){
        if(array_key_exists($name, $this->files)){
            return $this->files[$name];
        }

        return null;
    }

}