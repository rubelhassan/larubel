<?php

namespace Larubel\Libs\Services;

class Response{

    private static $baseUri;

    private static $uri;

    public static function redirect($url){
        $url = self::$baseUri . $url;
        header('Location: ' . $url);
        die();
    }

    public static function getBasePath(){
        return self::$baseUri;
    }

    public static function setBaseUri($baseUri){
        self::$baseUri = $baseUri;
    }

    public static function addValidationRedirect($uri){
        self::$uri = $uri;
    }

    public static function validationRedirect(){
        session_write_close();
        header('Location: ' . self::$uri);
        die();
    }
}