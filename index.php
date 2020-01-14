<?php

session_start();

/**
 * Setup your app
 * @autoload.php file to initialize database
 * */

$query = require 'vendor/autoload.php';
use MVC\Request;
use MVC\Router;
use MVC\database\Connection;
use MVC\database\QueryBuilder;
use MVC\Helper;

/** @var  $app empty variable to store config file */
$app = [];
$app['config'] = require 'config.php';

$conn = new Connection();
$pdo = Connection::make($app['config']['database']);
QueryBuilder::$pdo = $pdo;
$dbObj = new QueryBuilder();
$req = new Request();
$redirect = new Helper();
$router = new Router();

/**
 * Where are you in your page and where do you go with the
 * routes and controllers
 *
 * @routes.php routes to different endpoints
 * @Request::uri get the uri
 * @Request::method POST or GET?
 */
Router::load('routes.php') //chaining!!
    ->direct(Request::uri(), Request::method());


/**
  * setup global functions. Dump and die
 */
function dd($val=null) {
    return die(var_dump($val));
}


