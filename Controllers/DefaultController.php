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

        require '../default/game.php';
    }
}

?>;