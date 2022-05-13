<?php

namespace app\Controllers;

use app\Services\sessionService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    private $_loader;
    protected $render;

    protected $_sessionService;

    public function __construct(){
        // where are the templates ?
        $this->_loader = new FilesystemLoader('templates');

        // setting up the twig environment
        $this->render = new Environment($this->_loader, [
            'debug' => true, // allow dump()
        ]);

        $this->render->addExtension(new \Twig\Extension\DebugExtension()); // allow dump()

        // user is connected ? put it in session
        $this->_sessionService = new SessionService();
        $this->render->addGlobal('gamer', $this->_sessionService->gamer);
    }

}