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

        $errors = [];
//we check if there is errors and if not we check the database//

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = $this->isValidLoginForm();

            if (count($errors) == 0) {

//Database check//
                $gamer = $this->gamermanager->getOneByGamerName($_POST["pseudoInput"]);

                if (!is_null($gamer) && password_verify($_POST["passwordInput"], $gamer->getPassword())) {

                    $this->sessionService->gamer = serialize($gamer);
                    session_write_close();
                    if ($gamer->getRole() == "[ADMIN]") {
                        header('Location: /security/dashboard');
                    } else {

                        header('Location: /security/gamer');
                    }
                } else($errors[] = "Tu t'es trompé de mot de passe et/ou de pseudo!");
                $this->render->display('default/login.twig', ['errors' => $errors]);
            }
        }

        $this->render->display('default/login.twig', ['errors' => $errors]);
    }

    public function register()
    {
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check the register form
            $errors = $this->isValidRegisterForm($errors);

            // Save in the BDD
            if (count($errors) == 0) {
                $gamer = new Gamer(null, $_POST["pseudoRegister"], $_POST["passwordRegister"], $_POST["mailRegister"], "[GAMER]", "../../assets/pictures/dragon.png");

                $this->gamermanager->create($gamer);
                $this->gamermanager = new GamerManager();
                header('Location: /home/homepage');

            }

        }

        $this->render->display('default/login.twig', ['errors' => $errors]);
    }

    private function isValidLoginForm(): array
    {

        $errors = [];

        $password = $_POST["passwordInput"];
        $pseudo = $_POST["pseudoInput"];
        $antibot = $_POST["botLogPrevention"];

        if (empty($_POST["pseudoInput"])) {

            $errors[] = "Tu n'as pas saisi ton mot de passe et/ou ton pseudo!";
        }

        if (empty($_POST["passwordInput"])) {

            $errors[] = "Tu n'as pas saisi ton mot de passe et/ou ton pseudo!";

        }

        // REGEX FOR SECURITY VERIFICATION //

        //Minimum eight characters, at least one upper case English letter, one lower case English letter,
        //one number and one special character//

        if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/', $password)) {

            $errors[] = "Il faut que ton mot de passe ait au moins une majuscule, une minuscule, un chiffre, et un caractère spécial.Ah, et pas d'espace! Oui c'est embêtant, mais c'est pour sécuriser ton compte !";

        }

        if (!preg_match('#[a-z\d_-]{5,15}#', $pseudo)) {
            $errors[] = "Ton pseudo doit contenir entre 5 et 15 caractères, sans espace";

        }

        if (preg_match('#\s#', $pseudo) || preg_match('#\s#', $password)) {
            $errors[] = "Sans espace, on a dit !";

        }

        //ANTIBOT//

        if (!empty($antibot)) {

            $errors[] = "Bien tenté, le bot, bien tenté.";

        }


        return $errors;

    }

    private function isValidRegisterForm($errors)
    {

        $errors = [];

        $password = $_POST["passwordRegister"];
        $verifPassword = $_POST["passwordVerifRegister"];
        $pseudo = $_POST["pseudoRegister"];
        $mail = $_POST["mailRegister"];
        $antibot = $_POST["botPrevention"];

        if (empty($pseudo)) {

            $errors[] = "Met donc un pseudo, qu'on sache qui tu es !";
        }

        if (empty($password)) {

            $errors[] = "T'as oublié de choisir un mot de passe !";
        }

        if (empty($verifPassword)) {

            $errors[] = "Vérifie que t'as bien écrit ton mot de passe, quand même.";
        }

        if ($password != $verifPassword) {

            $errors[] = "C'est pas le même mot de passe !";
        }

        if (empty($mail)) {

            $errors[] = "Laisse nous ton mail, promis on t'enverra (peut-être) pas de bêtises.";
        }

        // REGEX FOR SECURITY VERIFICATION //

        //Minimum eight characters, at least one upper case English letter, one lower case English letter,
        //one number and one special character//

        if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/', $password)) {

            $errors[] = "Il faut que ton mot de passe ait au moins une majuscule, une minuscule, un chiffre, et un caractère spécial.Ah, et pas d'espace! Oui c'est embêtant, mais c'est pour sécuriser ton compte !";

        }

        if (!preg_match('#[a-z\d_-]{5,15}#', $pseudo)) {
            $errors[] = "Ton pseudo doit contenir entre 5 et 15 caractères, sans espace";

        }

        if (preg_match('#\s#', $pseudo) || preg_match('#\s#', $password)) {
            $errors[] = "Sans espace, on a dit !";

        }

        //ANTIBOT//

        if (!empty($antibot)) {

            $errors[] = "Bien tenté, le bot, bien tenté.";

        }


        return $errors;

    }

}

