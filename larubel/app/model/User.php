<?php

namespace App\Model;

class User{

    private $id;
    protected $tablename = 'users';
    private $name;
    private $email;

    public function id(){
        return $this->id;
    }

    public function name(){
        return $this->name;
    }

    public function email(){
        return $this->email;
    }
}