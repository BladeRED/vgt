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


}

if ($_GET["controller"] == 'login') {

    $controller = new LoginController();

    if ($_GET["action"] == 'login') {

        $controller->displayLogin();
    }


    if ($_GET["action"] == 'submit') {

        $controller->displaySubmit();
    }

    if ($_GET["action"] == 'user') {

        $controller->displayUser();
    }

}

if ($_GET["controller"] == 'admin') {

    $controller = new AdminController();

    if ($_GET["action"] == 'dashboard') {

        $controller->displayDashboard();
    }


}

?>