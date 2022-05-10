<?php

class DefaultController
{
    public function __construct()
    {

    }

    public function displayHomepage()
    {

        require 'templates/default/homepage.php';
    }

    public function displayGame()
    {

        require 'templates/default/game.php';
    }

    public function displayLogin()
    {

        require 'templates/default/login.php';
    }
}

