<?php

namespace app\Controllers;

class AuthController extends TwigController {

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

    public function displaySubmit()
    {

        $this->render->display('auth/submit.twig');
    }


    public function displayGamer()
    {

        $this->render->display('auth/gamer.twig');
    }
}