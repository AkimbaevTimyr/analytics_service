<?php

require_once ('./vendor/autoload.php');

use wfm\Router;
use wfm\Dispatcher;
use wfm\View;


error_reporting(E_ALL);
ini_set('display_errors', 'on');


//получаем маршруты
$routes = require $_SERVER['DOCUMENT_ROOT'] . '/config/routes.php';

//получаем controller, action, params
$track = ( new Router($routes) ) -> getTrack($routes, $_SERVER['REQUEST_URI']);


//получаем layout, title, view, data
$page = ( new Dispatcher )       -> getPage($track);


//получаем страницу
echo (new View) -> render($page);