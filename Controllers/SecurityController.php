<?php

namespace app\Controllers;

class SecurityController extends AbstractController
{

    /**
     * @param $gamermanager
     */
    public function __construct()
    {
        parent::__construct();

    }

    public function logout()
    {
//logout the session
        session_destroy();
        header("Location: index.php?controller=default&action=homepage");
    }

    public function displaySubmit()
    {

        $this->render->display('security/submit.twig');
    }


    public function displayGamer()
    {

        $this->render->display('security/gamer.twig');
    }

    public function displayDashboard()
    {
        if ($this->sessionService->gamer->getRole() == "[ADMIN]") {
            $this->render->display('security/admindashboard.twig');
        }else{

            $this->render->display('default/homepage.twig');
        }

    }

}


