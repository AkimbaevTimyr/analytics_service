<?php
require_once ('./vendor/autoload.php');

use wfm\Route;

return [
    new Route('/', 'main', 'index'),
    new Route('/test/', 'main', 'test'),
];