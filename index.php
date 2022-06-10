<?php
session_start();
require_once 'vendor/autoload.php';

use app\Controllers\AdminController;
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
$controller = new DefaultController();
$router->get('/', function () use ($controller) {
    $controller->displayHomepage();
});

$router->mount('/home', function () use ($controller, $router) {

    $router->get('/game/{id}', function ($id) use ($controller) {
        $controller->displayGame($id);
    });

    $router->get('/login', function () use ($controller) {
        $controller->displayLogin();
    });

    $router->get('/cookie', function () use ($controller) {
        $controller->acceptCookie();
    });

    $router->post('/connect', function () use ($controller) {
        $controller->connect();
    });

    $router->post('/register', function () use ($controller) {
        $controller->register();
    });

    $router->post('/search', function () use ($controller) {

        $controller->search();
    });

    $router->post('/searchInput', function () use ($controller) {

        $controller->searchInput();
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
});

$router->before('GET|POST', '/admin/.*', function () use ($router) {
    $role = "[ADMIN]";
    if (!str_contains($_SESSION["gamer"], $role)) {
        header('Location: /home/homepage');
        exit();
    }
});

$router->mount('/admin', function () use ($router) {
    $controller = new AdminController();

//dashboard//

    $router->post('/dashboard', function () use ($controller) {
        $controller->dashboard();
    });

    $router->get('/dashboard', function () use ($controller) {
        $controller->dashboard();
    });

    // lists //

    $router->get('/games', function () use ($controller) {
        $controller->findAll();
    });

    $router->get('/users', function () use ($controller) {
        $controller->findAll();
    });

    $router->get('/times', function () use ($controller) {
        $controller->findAll();
    });

    $router->get('/reviews', function () use ($controller) {
        $controller->findAll();
    });

    // add datas //

    $router->post('/addGames', function () use ($controller) {
        $controller->add();
    });

    $router->post('/addUsers', function () use ($controller) {
        $controller->add();
    });

    $router->get('/addTimes', function () use ($controller) {
        $controller->add();
    });

    $router->get('/addReviews', function () use ($controller) {
        $controller->add();
    });

    $router->get('/deleteUsers/{id}', function ($id) use ($controller) {
        $controller->delete($id);
    });

    $router->get('/deleteTimes/{id}', function ($id) use ($controller) {
        $controller->delete($id);
    });

    $router->get('/deleteReviews/{id}', function ($id) use ($controller) {
        $controller->delete($id);
    });

    $router->get('/deleteGames/{id}', function ($id) use ($controller) {
        $controller->delete($id);
    });

    $router->post('/editUsers/{id}', function ($id) use ($controller) {
        $controller->edit($id);
    });

    //AJAX//

    $router->get('/users/{id}', function ($id) use ($controller) {
        $controller->ajaxModal($id);
    });


});


$router->run();
