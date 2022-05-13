<?php

namespace app\Controllers;

use app\Models\Gamer;
use app\Managers\GamerManager;

class DefaultController extends AbstractController
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

    public function displayHomepage()
    {

        $this->render->display('default/homepage.twig');
    }

    public function displayGame()
    {

        $this->render->display('default/game.twig');
    }

    public function displayLogin()
    {

        $this->render->display('default/login.twig');
    }

    public function connect()
    {

        $errors = null;
//login with the login form

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = $this->isValidLoginForm();

            if (count($errors) == 0) {

//Database check
                $gamer = $this->gamermanager->getOneByGamerName($_POST["pseudoInput"]);

                if (!is_null($gamer) && password_verify($_POST["passwordInput"], $gamer->getPassword())) {
                    $this->sessionService->gamer = serialize($gamer);
                    session_write_close();
                    if ($gamer->getRole() == "[ADMIN]") {
                        header('Location: /security/dashboard');
                    } else {

                        header('Location: /security/gamer');
                    }
                } else {
                    $errors[] = "IDENTIFIANTS INCORRECT";
                }
            }
        };
        $this->render->display('default/login.twig');
    }

    public function register()
    {
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check the register form
            $errors = $this->isValidRegisterForm();

            // Save in the BDD
            if (count($errors) == 0) {
                $gamer = new Gamer(null, $_POST["pseudoRegister"], $_POST["passwordRegister"], $_POST["mailRegister"], "[GAMER]");

                $this->gamermanager->create($gamer);
                $this->gamermanager = new GamerManager();
                $_SESSION["gamer"] = serialize($gamer);
                $this->render->display('security/gamer.twig');

            }

        }

        $this->render->display('default/login.twig');
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

}

