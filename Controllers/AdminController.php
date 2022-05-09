<?php

class AdminController
{
    public function __construct()
    {

    }

    public function displayDashboard()
    {

        require 'templates/admin/admindashboard.php';
    }

}

?>