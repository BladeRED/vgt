<?php
session_start();
require_once 'vendor/autoload.php';

use app\Controllers\DefaultController;
use app\Controllers\SecurityController;
use Bramus\Router\Router;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$router = new \Bramus\Router\Router();


$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

// Define routes

$router->mount('/home', function () use ($router) {
    $controller = new DefaultController();
    $router->get('/homepage', function () use ($controller) {
        $controller->displayHomepage();
    });

    $router->get('/game', function () use ($controller) {
        $controller->displayGame();
    });

    $router->get('/login', function () use ($controller) {
        $controller->displayLogin();
    });

    $router->post('/connect', function () use ($controller) {
        $controller->connect();
    });

    $router->post('/register', function () use ($controller) {
        $controller->register();
    });
});

$router->before('GET|POST', '/security/.*', function () use ($router) {

    if (!isset($_SESSION['gamer'])) {
        header('Location: /home/homepage');
        exit();
    }
});


$router->mount('/security', function () use ($router) {
    $controller = new SecurityController();

    $router->get('/submit', function () use ($controller) {
        $controller->displaySubmit();
    });

    $router->get('/gamer', function () use ($controller) {
        $controller->displayGamer();
    });

    $router->get('/logout', function () use ($controller) {
        $controller->logout();
    });

    $router->post('/editGamer', function () use ($controller) {
        $controller->editGamer();
    });

    $router->get('/dashboard', function () use ($controller) {
        $controller->displayDashboard();
    });


});
$router->run();
