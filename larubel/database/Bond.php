<?php

namespace Larubel\Database;

use \Larubel\Database\Interfaces\ORMInterface as ORMInterface;

class Bond implements ORMInterface{

    protected static $db;

    /**
     * ORMInterface methods implementation
     */
    public static function all($model){  
        return (self::$db)->all($model);
    }

    public static function find($model, $id){
        return (self::$db)->find($model, $id);
    }

    public static function init($db){
        if(self::$db == null)
            self::$db = $db;
    }
}

// initialize Bond ORM with db configurations
Bond::init(new Database(
    Connection::make(DB_CONFIGURATION['database'])
));