<?php

class DefaultController
{
    public function __construct()
    {

    }

    public function displayHomepage()
    {

        require '../default/homepage.php';
    }

    public function displayGame()
    {

        require '../default/game.php';
    }
}

?>;