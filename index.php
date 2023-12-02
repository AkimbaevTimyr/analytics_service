<?php

require_once ('./vendor/autoload.php');

use core\Router;
use core\Dispatcher;
use core\View;



error_reporting(E_ALL);
ini_set('display_errors', 'on');

//получаем маршруты
$routes = require __DIR__ . '/config/routes.php';


//получаем controller, action, params
$track = ( new Router($routes) ) -> getTrack($routes, $_SERVER['REQUEST_URI']);

//получаем layout, title, view, data
$page = ( new Dispatcher )       -> getPage($track);

//получаем страницу
echo (new View) -> render($page);

