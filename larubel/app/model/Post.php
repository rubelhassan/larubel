<?php

namespace App\Model;

use Larubel\Database\Query;

class Post{

    protected $id;
    protected $tablename = 'posts';
    public $title;
    public $body;
    public $slug;

    public function getId(){
        return $this->id;
    }
}