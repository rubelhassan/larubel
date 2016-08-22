<?php
/*
 * define app base path
 */
define('BASEPATH', __DIR__);

/*
 * define all database configuration here
 * using PDO (php data objects) extension
 */
define ('DB_CONFIGURATION', [
    'database' => [
        'name'      => 'test',
        'username'  => 'webadmin',
        'password'  => 'rubel',
        'connection'=> 'mysql', 
        'host'      => 'localhost', 
        'options'   => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
]);
