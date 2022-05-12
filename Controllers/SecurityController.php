<?php

namespace app\Controllers;

use app\Models\Gamer;
use app\Managers\GamerManager;

class SecurityController extends TwigController
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

    public function login()
    {

        $errors = null;
//login with the login form

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = $this->isValidLoginForm();

            if (count($errors) == 0) {

//Database check
                $gamer = $this->gamermanager->getOneByGamerName($_POST["pseudoInput"]);

                if (!is_null($gamer) && password_verify($_POST["passwordInput"], $gamer->getPassword()) && $gamer->getRole() == "[ADMIN]") {
                    $_SESSION["gamer"] = serialize($gamer);

                    $this->render->display('admin/admindashboard.twig');

                } elseif (!is_null($gamer) && password_verify($_POST["passwordInput"], $gamer->getPassword()) && $gamer->getRole() == "[GAMER]") {
                    $_SESSION["gamer"] = serialize($gamer);
                    $this->render->display('security/gamer.twig');

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
                $_SESSION["gamer"] = serialize($gamer);
                $this->render->display('security/gamer.twig');

            }


        }

        $this->render->display('default/login.twig');
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

}


