<?php

namespace app\Controllers;

use app\Models\Gamer;
use app\Managers\GamerManager;

class SecurityController extends AbstractController
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


    public function logout()
    {
//logout the session
        session_destroy();
        header("Location: index.php?controller=default&action=homepage");
    }


    private function isValidLoginForm(): array
    {

        $errors = [];
        if (empty($_POST["pseudoInput"])) {

            $errors[] = "Tu t'es trompé de mot de passe et/ou de pseudo!";
        }

        if (empty($_POST["passwordInput"])) {

            $errors[] = "Tu t'es trompé de mot de passe et/ou de pseudo!";
        }


        return $errors;

    }

    private function isValidRegisterForm()
    {

        $errors = [];
        if (empty($_POST["pseudoRegister"])) {

            $errors[] = "Met donc un pseudo, qu'on sache qui tu es !";
        }

        if (empty($_POST["passwordRegister"])) {

            $errors[] = "T'as oublié de choisir un mot de passe !";
        }

        if (empty($_POST["passwordVerifRegister"])) {

            $errors[] = "Vérifie que t'as bien écrit ton mot de passe, quand même.";
        }

        if ($_POST["passwordRegister"] != $_POST["passwordVerifRegister"]) {

            $errors[] = "C'est pas le même mot de passe !";
        }

        if (empty($_POST["mailRegister"])) {

            $errors[] = "Laisse nous ton mail, promis on t'enverra (peut-être) pas de bêtises.";
        }


        return $errors;

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

        $this->render->display('admin/admindashboard.twig');
    }

}


