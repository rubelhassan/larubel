<?php

namespace Larubel\Database;

class Connection{

    /**
     * establish connection with database with 
     * given configuration
     * @param  array $config array hold database related infos
     * @return PDO   return PDO object if connection is successful 
     */
    public static function make($config){
        
        try{
            // PDO(dsn, usesrname, password)
            return new \PDO(
                $config['connection'] . ':host=' . $config['host'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options'] 
            );
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
}