<?php

namespace app\Controllers;

class AdminController extends AbstractController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function displayDashboard()
    {

        $this->render->display('admin/admindashboard.twig');
    }

}

