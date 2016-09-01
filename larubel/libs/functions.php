<?php

// global functions

define('VIEW_PATH',  BASEPATH. '\\app\\views\\');

function session($name){
    return Larubel\Libs\Services\Session::get($name);
}

function sessionErase($name){
    return Larubel\Libs\Services\Session::delete($name);
}

function url($path){
    $prefix = Larubel\Libs\Services\Response::getBasePath();
    return $prefix . $path;
}

function src($path){
    $prefix = str_replace('\\', '/', VIEW_PATH);
    return $prefix . $path;
}