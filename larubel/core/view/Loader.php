<?php

namespace Larubel\Core\View;

/**
 * Loader.php
 *
 * class Loader
 * load anything ralated to views
 * 
 * @package Larubel\Core\View
 * @author Rubel Hassan <rubelhassan@outlook.com>
 * @copyright 2016, Rubel
 * @license The MIT License
 */
class Loader{

    protected $path;

    /**
     * initilize object with views path
     * @param string $path contains views path in the application 
     */
    public function __construct($path){
        $this->path = $path;
    }

    /**
     * fetch view if found in views directory - $path
     * @param  stirng   $view view filename with/without extension or just name
     * @return string   file path of given view
     */
    public function fetch($view){
        
        if(file_exists($this->path . $view . '.php')){
            return $this->path . $view . '.php';
        }

        if(file_exists($this->path . $view . '.view.php')){
            return $this->path . $view . '.view.php';
        }

        if(file_exists($this->path . $view)){
            return $this->path .  $view;
        }


        throw new Exception("View does not exists" . $this->path.$view); 
    }
}