<?php

namespace app\Controllers;

use app\Services\sessionService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class TwigController
{
    private $_loader;
    protected $render;

    private $_sessionService;

    public function __construct(){
        // where are the templates ?
        $this->_loader = new FilesystemLoader('templates');

        // setting up the twig environment
        $this->render = new Environment($this->_loader, [
            'debug' => true, // allow dump()
        ]);

        $this->render->addExtension(new \Twig\Extension\DebugExtension()); // allow dump()


    }

}