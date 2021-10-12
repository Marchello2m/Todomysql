<?php
require 'vendor/autoload.php';

session_start();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'TasksController@index');
  $r->addRoute('GET', '/tasks', 'TasksController@index');
    $r->addRoute('GET', '/tasks/create', 'TasksController@create');
    $r->addRoute('POST', '/tasks', 'TasksController@store');
    $r->addRoute('POST', '/tasks/{id}', 'TasksController@delete');
    $r->addRoute('GET', '/tasks/{id}', 'TasksController@show');


$r->addRoute('GET','/users','UsersController@index');

    $r->addRoute('GET','/register','AuthController@showregisterForm');
    $r->addRoute('POST','/register','AuthController@register');


    $r->addRoute('GET','/login','AuthController@showLoginForm');
    $r->addRoute('POST','/login','AuthController@login');

    $r->addRoute('POST','/logout','AuthController@logout');



});

function base_path():string
{
    return __DIR__;
}


// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
       [$controller,$method]=explode('@',$handler);
       $controller = 'App\Controllers\\'.$controller;
       $controller =new $controller;
       $controller->$method($vars);
        break;
}