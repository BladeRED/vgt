<?php

class LoginController
{
    public function __construct()
    {

    }

    public function displayLogin()
    {

        require '../login/login.php';
    }

    public function displayUser()
    {

        require '../login/user.php';
    }
}

?>;