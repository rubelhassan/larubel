<?php

namespace Larubel\Database;

use \Larubel\Database\Interfaces\ORMInterface as ORMInterface;

class Bond implements ORMInterface{

    private static $db;

    public static function all($model){  
        return (self::$db)->all($model);
    }

    public static function find($model, $id){
        return (self::$db)->find($model, $id);
    }

    public static function init($db){
        self::$db = $db;
    }
}

// initialize Bond db with configurations
Bond::init(new Database(
    Connection::make(DB_CONFIGURATION['database'])
));