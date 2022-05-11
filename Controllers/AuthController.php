<?php

namespace app\Controllers;

abstract class AuthController extends TwigController {

    public function __construct()
    {
        parent::__construct();
        $this->checkAuth();

    }

    public function checkAuth()
    {
        if (!isset($_SESSION["gamer"])) {
            header("Location: index.php?controller=default&action=homepage");
        }
    }
}