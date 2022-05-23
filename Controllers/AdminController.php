<?php

namespace app\Controllers;

use app\Managers\GameManager;
use app\Managers\GamerManager;
use app\Managers\TimeManager;
use app\Services\sessionService;

class AdminController extends AbstractController
{
    private GamerManager $gamermanager;
    private GameManager $gamemanager;
    private TimeManager $timemanager;


    /**
     * @param $gamermanager
     */
    public function __construct()
    {
        parent::__construct();
        $this->gamermanager = new GamerManager();
        $this->gamemanager = new GameManager();
        $this->timemanager = new TimeManager();
    }

    public function dashboard()
    {
        $this->render->display('admin/dashboard.twig');

    }

    public function findAll()
    {
        $games = $this->gamemanager->findAll();
        $users = $this->gamermanager->findAll();
        $times = $this->timemanager->findAll();


        if ($_SERVER['REQUEST_URI'] == '/admin/users') {
            $this->render->display('admin/users.twig', ['users' => $users]);
        } else if ($_SERVER['REQUEST_URI'] == '/admin/games') {
            $this->render->display('admin/gamesAdmin.twig', ['games' => $games]);
        } else if ($_SERVER['REQUEST_URI'] == '/admin/times') {
            $this->render->display('admin/times.twig', ['times' => $times]);
        }
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


