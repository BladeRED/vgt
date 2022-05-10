<?php

abstract class AuthController{

    public function __construct()
    {
        $this->checkAuth();

    }

    public function checkAuth()
    {
        if (!isset($_SESSION["gamer"])) {
            header("Location: index.php?controller=default&action=homepage");
        }
    }
}