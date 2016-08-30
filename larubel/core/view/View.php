<?php 

namespace Larubel\Core\View;

/**
 * View.php
 *
 * class View
 * recieve controller request 
 * and render views with given data
 * 
 * @package Larubel\Core\View
 * @author Rubel Hassan <rubelhassan@outlook.com>
 * @copyright 2016, Rubel
 * @license The MIT License
 */
class View{

    // loader for this View objcet
    protected $loader;

    // store data come from controller
    protected $data = [];

    /**
     * consturct View object with a loader
     * @param Larubel\Core\View\Loader $loader 
     */
    public function __construct($loader){
        $this->loader = $loader;
    }

    public function setData($data){
        $this->data[] = $data;
    }

    /**
     * return a view using loader with given data
     * @param string $view view path 
     * @param array $data incoming data from controller
     * @return string compiled contents of view
     */
    public function render($view, $data=[]){
        ob_start();
        extract($data);
        global $errors;
        include $this->loader->fetch($view);
        return ob_get_clean();
    }

}