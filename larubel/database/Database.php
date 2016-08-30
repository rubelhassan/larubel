<?php

namespace Larubel\Database;

class Database{

    protected $pdo;

    public function __construct(\PDO $pdo){

        $this->pdo = $pdo;
    }

    /**
     * find all rows from database associted with
     * given model class
     * @param string $model model class name with namespace
     */
    public function all($model){

        if(!class_exists($model)){
             return new $model;
        }

        $table = $this->getTableName($model);
        $stmt = $this->pdo->prepare('select * from ' . $table);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, $model);
    }


    /**
     * find all rows from database associted with
     * given model class by id
     * @param string $model model class name with namespace
     * @param ? $id model id in database
     */
    public function find($model, $id){

        if(!class_exists($model)){
             return new $model;
        }

        $table = $this->getTableName($model);
        $stmt = $this->pdo->prepare('select * from ' . $table . ' where id=?');
        $stmt->execute([$id]);

        return $stmt->fetchAll(\PDO::FETCH_CLASS, $model);
    }

    /**
     * find data from table based on conditions
     * @param  String  $model       model class path
     * @param  array   $conditions  field and values in condition
     * @param  integer $limit       limit query
     * @return array                array of resultant model objects
     */
    public function findWhere($model, $conditions, $limit = 0){

        if(!class_exists($model)){
             return new $model;
        }

        $table = $this->getTableName($model);

        $sql = 'select * from ' . $table . ' where ';
        $values = [];
        $counter = 1;

        foreach ($conditions as $key => $value) {
            if($counter > 1)
                $sql .= ' AND ';

            $sql .= $key . '=?';
            $values[] = $value; 
            $counter++;
        }

        if($limit > 0)
            $sql .= ' LIMIT ' . $limit;
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);

        return $stmt->fetchAll(\PDO::FETCH_CLASS, $model);
    }

    /**
     * find out tablename using model class 
     * @param string $model model class name with namespace
     */
    private function getTableName($model){

        if(property_exists($model, 'tablename')){
            return \Larubel\Libs\Helpers\Helper::getValueFromClassProperty($model, 'tablename');
        }

        // if given class has no propery name 'tablename' 
        // then generate a generic table name adding 's' at end with model 
        return strtolower(\Larubel\Libs\Helpers\Helper::splitStringLast($model, '\\')) . 's';
    }
}
