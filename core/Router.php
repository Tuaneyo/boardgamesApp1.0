<?php
namespace MVC;

use MVC\View;
use MVC\Request;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
        //PATCH, PUT, DELETE will come here aswell
    ];

    public static function load($file)
    {
        $router = new self();
        require $file;
        return $router;
    }

    public function get($uri, $controller)
    {
        //$this->routes['GET'] gives an array

        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        //$this->routes['POST'] gives an array
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requesttype)
    {

        //example: www.wfgamesapp.com/players we only need players
        /**
         * call controller based on Request uri
         */

        if(array_key_exists($uri, $this->routes[$requesttype])){
            $value =  explode('@',$this->routes[$requesttype][$uri]);
            $controllerName = $value[0];
            $controllerMethod = $value[1];
            $req = new Request();
            $controllerNameSpaced = "MVC" . '\\' . 'controllers' . '\\' . $controllerName;
            $controllerInstance = new $controllerNameSpaced;
            $instaced = $controllerInstance->$controllerMethod($req);
            return $instaced;

        }else{
            $this->return404();
        }


    }

    /**
     * Return 404 error page
     */


    public function return404()
    {
        echo View::render('404', []);
    }


}