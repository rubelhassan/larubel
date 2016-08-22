<?php

namespace Larubel\Libs\Helpers;

class Helper{

    public static function splitStringLast($name, $delimeter){
        
        $parts = explode($delimeter, $name);
        $last = end($parts);
        return $last;
    }

    public static function getValueFromClassProperty($className, $classProperty){
        
        $obj = new $className;
        $ref = new \ReflectionObject($obj);
        $property = $ref->getProperty($classProperty);
        $property->setAccessible(true);

        return $property->getValue($obj);
    }
}