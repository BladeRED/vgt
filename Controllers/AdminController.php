<?php

class AdminController extends AuthController
{
    public function __construct()
    {
        parent::__construct();


    }

    public function displayDashboard()
    {

        require 'templates/admin/admindashboard.php';
    }

}

