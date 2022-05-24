<?php

namespace app\Controllers;

use app\Managers\GameManager;
use app\Managers\GamerManager;
use app\Managers\ReviewManager;
use app\Managers\TimeManager;
use app\Services\sessionService;

class AdminController extends AbstractController
{
    private GamerManager $gamermanager;
    private GameManager $gamemanager;
    private TimeManager $timemanager;
    private ReviewManager $reviewmanager;


    /**
     * @param $gamermanager
     */
    public function __construct()
    {
        parent::__construct();
        $this->gamermanager = new GamerManager();
        $this->gamemanager = new GameManager();
        $this->timemanager = new TimeManager();
        $this->reviewmanager = new ReviewManager();
    }

    public function dashboard()
    {
        $this->render->display('admin/dashboard.twig');

    }

    public function findAll()
    {

        if ($_SERVER['REQUEST_URI'] == '/admin/users') {
            $users = $this->gamermanager->findAll();
            $this->render->display('admin/users.twig', ['users' => $users]);
        } else if ($_SERVER['REQUEST_URI'] == '/admin/games') {
            $games = $this->gamemanager->findAll();
            $this->render->display('admin/gamesAdmin.twig', ['games' => $games]);
        } else if ($_SERVER['REQUEST_URI'] == '/admin/times') {
            $times = $this->timemanager->findAll();
            $this->render->display('admin/times.twig', ['times' => $times]);
        } else if ($_SERVER['REQUEST_URI'] == '/admin/reviews') {
            $reviews = $this->reviewmanager->findAll();
            $this->render->display('admin/reviews.twig', ['reviews' => $reviews]);
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


