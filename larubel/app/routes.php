<?php

/**
 * all the application routes go here
 */

$router->get('/', 'HomeController@index');

$router->get('/home', 'HomeController@index');
$router->post('/home', 'HomeController@post');

$router->get('/home/(\d+)/post', 'HomeController@show');
$router->get('/home/(?P<home>\d+)/post/(?P<post>\d+)/rubel/(?P<rubel>\d+)', 'HomeController@hola');

$router->get('/home/(\d+)', function ($no){
    echo $no;
});

$router->get('/posts', 'PostController@index');
$router->get('/posts/(\d+)', 'PostController@show');

// all routes related to user
$router->get('/user/login', 'UserController@getLogin');
$router->post('/user/login', 'UserController@postLogin');
$router->get('/user/signup', 'UserController@getSignup');
$router->post('/user/signup', 'UserController@create');
$router->get('/user/profile', 'UserController@show');