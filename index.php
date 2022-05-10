<?php

require 'loader.php';

if (!isset($_GET["controller"]) && !isset($_GET["action"])) {

    header('Location: index.php?controller=default&action=homepage');
}

if ($_GET["controller"] == 'default') {

    $controller = new DefaultController();

    if ($_GET["action"] == 'homepage') {

        $controller->displayHomepage();
    }

    if ($_GET["action"] == 'game') {

        $controller->displayGame();
    }

    if ($_GET["action"] == 'login') {

        $controller->displayLogin();
    }


}


if ($_GET["controller"] == 'admin') {

    $controller = new AdminController();

    if ($_GET["action"] == 'dashboard') {

        $controller->displayDashboard();
    }


}

if ($_GET["controller"] == "security") {

    $controller = new SecurityController();

    if ($_GET["action"] == "login") {

        $controller->login();

    }

    if ($_GET["action"] == "register") {

        $controller->register();

    }

    if ($_GET["action"] == "logout") {


        $controller->logout();
    }

    if ($_GET["action"] == 'submit') {

        $controller->displaySubmit();
    }

    if ($_GET["action"] == 'gamer') {

        $controller->displayGamer();
    }


}

?>