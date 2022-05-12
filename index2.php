<?php

require_once 'vendor/autoload.php';
$router = new \Bramus\Router\Router();

use app\Controllers\AuthController;
use app\Controllers\DefaultController;
use app\Controllers\AdminController;
use app\Controllers\SecurityController;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

session_start();

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

// Define routes //

$controller = new DefaultController();

$router->get('/', function () use ($controller) {
    $controller->displayHomepage();
});

$router->get('/login', function () use ($controller) {
    $controller->displayLogin();
});

$router->get('/game', function () use ($controller) {
    $controller->displayGame();
});


$router->run();
