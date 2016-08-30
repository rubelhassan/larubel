<?php

/**
 * Router.php
 *
 * class Router
 * handle incoming routes to the application
 * 
 * @package Larubel\Core\Router
 * @author Rubel Hassan <rubelhassan@outlook.com>
 * @copyright 2016, Rubel
 * @license The MIT License
 */

namespace Larubel\Core\Router;

use Larubel\Libs\Services\Request;

class Router{

    // routes hold array of patterns and actions by their request type
    private $routes = [];

    // hold requested method
    private $requestedMethod;

    // hold not found action
    private $notFoundAction;
    
    // the application base path
    private $appBasePath;


    public function __construct(){

        $this->notFoundAction = function($url){
            echo "{$url} is not found";
        };
    }

    /**
     * set not found action if needed
     * @param closures $action action to perform when uri is not found
     */
    public function setNotFoundAction($action){
        $this->notFoundAction = $action;
    }

    /**
     * register GET route with patter and actions
     * @param  string $pattern uri pattern like '/home'
     * @param  string $action  contains controller class name and action like 'HomeController@index'
     */
    public function get($pattern, $action){
        $this->add('GET', $pattern, $action);
    }

    /**
     * register POST route with patter and actions
     * @param  string $pattern  uri pattern like '/home'
     * @param  string $action   contains controller class name and action like 'HomeController@post'
     */
    public function post($pattern, $action){
        $this->add('POST', $pattern, $action);
    }

    /**
     * register pattern and associated action to routes array
     * @param string $method  like 'GET', 'POST'
     * @param string $pattern uri pattern
     * @param string $action  action like 'HomeController@post'
     */
    public function add($method, $pattern, $action){

        // remove any forward slash at the end of pattern if any else just put a '/'
        $pattern =  rtrim($pattern, '/') == '' ? '/' : rtrim($pattern, '/');
        $this->routes[$method][$pattern] =  $action;
    }

    /**
     * get requested method
     * @return string request method like 'GET'
     */
    public function getRequestMethod(){
        $method = $_SERVER['REQUEST_METHOD'];
        
        return $method;

        // TO DO 
        // if request method is other than GET/POST
    }

    /**
     * read uri requested to the application and take action
     */
    public function run(){

        // first set request method
        $this->requestedMethod = $this->getRequestMethod();

        // set request
        $this->request = new Request();

        // check if routes is set for given request method
        if(isset($this->routes[$this->requestedMethod])){
            $this->handle($this->routes[$this->requestedMethod]);
        }else{
            header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        }
    }

    /**
     * get current uri requested by the user
     * @return string processed uri
     */
    public function getUri(){

        // get current requested uri substracting base path if has
        $uri = substr($_SERVER['REQUEST_URI'], strlen($this->getAppBasePath()));

        //split out parts started from ? in uri
        if(strstr($uri, '?')){
            $uri = substr($uri, 0, strpos($uri, '?'));
        }

        //add / at the begin cause at least '/' is subtracted from above uri 
        return '/' . trim($uri, '/');
    }

    /**
     * handle requested uri to the application match with routes
     * if any match found then pass request to related controller with action
     * @param array $routes array of routes by requested method
     */
    public function handle($routes){

        $uri = $this->getUri();

        foreach ($routes as $pattern => $actions) {

            if(preg_match('~^'. $pattern . '$~', $uri, $matches)){
                
                // get the matches except the uri at first match
                $params = array_slice($matches, 1);

                // now first find if actions is just a callable action
                if(is_callable($actions)){
                    $action = $actions;
                }
                // nope now extract controller and action from actions defined in pattern and bind to an array
                else{
                    $actions = explode('@', $actions);
                    $controller = 'App\\Controllers\\' . $actions[0];
                    $action = $actions[1];
                    $action = [(new $controller), $action];
                }  

                // if request method is post then pass Request object
                if($this->requestedMethod == 'POST')
                    return call_user_func_array($action, [$this->request]);

                // multiple params are found call action with params
                if( count($params) > 1){
                    return call_user_func_array($action, [$params]);
                }

                // if only one parameter is found the pass jus a var not an array
                if( isset($params[0])){
                    return call_user_func_array($action, [$params[0]]);
                }

                return call_user_func($action);
            }
        }

        call_user_func_array($this->notFoundAction, [$uri]);

    }

    /**
     * return application base path 
     * if not set then set path and return
     * @return string application base path
     */
    private function getAppBasePath(){

        if($this->appBasePath === null){
            $this->appBasePath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        }

        return $this->appBasePath;
    }
}
