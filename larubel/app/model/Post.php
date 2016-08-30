<?php

namespace App\Model;

use Larubel\Database\Query;

class Post{

    protected $id;
    protected $tablename = 'posts';
    private $title;
    private $body;
    private $slug;

    public function getId(){
        return $this->id;
    }
}