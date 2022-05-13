<?php
session_start();
require_once 'vendor/autoload.php';

use app\Controllers\DefaultController;
use app\Controllers\SecurityController;
use Bramus\Router\Router;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$router = new \Bramus\Router\Router();


$sessionService = new \app\Services\sessionService();

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

// Default controller, value changing depending on the route //
$controller = new DefaultController();

// Define routes

if (!isset($_GET["controller"]) && !isset($_GET["action"])) {

    // default redirection //
    $router->get('/home', function () use ($controller) {
        $controller->displayHomepage();
    });
}

$router->mount('/home', function () use ($controller, $router) {

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

$router->before('GET|POST', '/security/.*', function () use ($router, $controller) {

    if (!isset($sessionService->gamer)) {
        $controller->displayHomepage();
        exit();
    }
});


$router->mount('/security', function () use ($controller, $router) {
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

});
$router->run();
