<?php

namespace Larubel\Database\Interfaces;


interface ORMInterface{

    /**
     * find all information from database related to this model
     */
    public static function all($model);

    /**
     * find all information from database related to this model by id
     */
    public static function find($model, $id);

    /**
     * find model by conditions
     */
    public static function findWhere($model, $conditions = []);
    
}