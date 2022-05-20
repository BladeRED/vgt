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
        $this->render->display('admin/dashboard.twig');

    }
    public function games()
    {
        $this->render->display('admin/gamesAdmin.twig');

    }

    public function users()
    {
        $users=$this->gamermanager->findAll();
        $this->render->display('admin/users.twig', ['users' => $users]);

    }

    public function times()
    {
        $this->render->display('admin/times.twig');

    }

    public function reviews()
    {
        $this->render->display('admin/reviews.twig');

    }

}


