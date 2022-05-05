<?php

class LoginController
{
    public function __construct()
    {

    }

    public function displayLogin()
    {

        require 'templates/login/login.php';
    }

    public function displaySubmit()
    {

        require 'templates/login/submit.php';
    }


    public function displayUser()
    {

        require 'templates/login/user.php';
    }
}

?>;