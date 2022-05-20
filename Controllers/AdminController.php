<?php

namespace app\Controllers;

use app\Managers\GamerManager;
use app\Services\sessionService;

class AdminController extends AbstractController
{
    private GamerManager $gamermanager;


    /**
     * @param $gamermanager
     */
    public function __construct()
    {
        parent::__construct();
        $this->gamermanager = new GamerManager();

    }

    public function dashboard()
    {
        $this->render->display('security/admindashboard.twig');

    }
    public function gamesAdmin()
    {
        $this->render->display('security/admindashboard.twig');

    }

    public function usersAdmin()
    {
        $this->render->display('security/admindashboard.twig');

    }

    public function timesAdmin()
    {
        $this->render->display('security/admindashboard.twig');

    }

    public function reviewsAdmin()
    {
        $this->render->display('security/admindashboard.twig');

    }

}


