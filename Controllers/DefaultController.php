<?php

namespace app\Controllers;

class DefaultController extends TwigController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function displayHomepage()
    {

        $this->render->display('default/homepage.twig');
    }

    public function displayGame()
    {

        require 'templates/default/game.twig';
    }

    public function displayLogin()
    {

        require 'templates/default/login.php';
    }
}

