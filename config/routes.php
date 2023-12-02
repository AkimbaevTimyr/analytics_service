<?php
require_once ('./vendor/autoload.php');

use core\Route;

return [
    new Route('/', 'main', 'index'),
    new Route('/test/', 'main', 'test'),
];