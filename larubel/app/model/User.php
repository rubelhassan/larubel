<?php

namespace App\Model;

class User{

    private $id;
    protected $tablename = 'users';
    private $name;
    public $email;

    public function id(){
        return $this->id;
    }

    public function name(){
        return $this->name;
    }

    public function email(){
        return $this->email;
    }

    public function hello(){
        return 'hello';
    }
}