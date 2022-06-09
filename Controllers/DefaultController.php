<?php

namespace app\Controllers;

use app\Managers\GameManager;
use app\Models\Gamer;
use app\Managers\GamerManager;

class DefaultController extends AbstractController
{
    private GamerManager $gamermanager;
    private GameManager $gamemanager;

    /**
     * @param $gamermanager
     */


    public function __construct()
    {
        parent::__construct();
        $this->gamermanager = new GamerManager();
        $this->gamemanager = new GameManager();
    }

    public function displayHomepage()
    {

        $this->render->display('default/homepage.twig');
    }

    public function displayGame($id)
    {
        $game = $this->gamemanager->findByGameId($id);
        $this->render->display('default/game.twig', ['game' => $game]);
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
                        header('Location: /admin/dashboard');
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
                $gamer = new Gamer(null, $_POST["pseudoRegister"], $_POST["passwordRegister"], $_POST["mailRegister"], "[GAMER]", "../../assets/pictures/dragon.png", date("m.d.y"));

                $this->gamermanager->create($gamer);
                $this->gamermanager = new GamerManager();
                header('Location: /home/homepage');

            }

        }

        $this->render->display('default/login.twig', ['errors' => $errors]);
    }

    public function search()
    {

        $errors= [];
        $searchResult = trim($_POST["searchResult"]);

        if (strlen($searchResult) >=0 && strlen($searchResult)<= 2) {
                    $searches = null;
            $this->render->display('default/gameslist.twig', ['searches' => $searches,
                'errors' => $errors]);
        } else {
            $searches = $this->gamemanager->search($searchResult);

            $this->render->display('default/gameslist.twig', ['searches' => $searches,
                'errors' => $errors]);
        }
    }

    private function isValidLoginForm(): array
    {

        $errors = [];

        $password = $_POST["passwordInput"];
        $pseudo = $_POST["pseudoInput"];
        $antibot = $_POST["botLogPrevention"];

        return $this->checkLogForm($password, $errors, $pseudo, $antibot);

    }

    private function isValidRegisterForm(): array
    {

        $errors = [];

        $password = $_POST["passwordRegister"];
        $verifPassword = $_POST["passwordVerifRegister"];
        $pseudo = $_POST["pseudoRegister"];
        $mail = $_POST["mailRegister"];
        $antibot = $_POST["botPrevention"];

        if (empty($verifPassword)) {

            $errors[] = "Vérifie que t'as bien écrit ton mot de passe, quand même.";
        }

        if ($password != $verifPassword) {

            $errors[] = "C'est pas le même mot de passe !";
        }

        if (empty($mail)) {

            $errors[] = "Laisse nous ton mail, promis on t'enverra (peut-être) pas de bêtises.";
        }

        return $this->checkLogForm($password, $errors, $pseudo, $antibot);
    }

    /**
     * @param mixed $password
     * @param array $errors
     * @param mixed $pseudo
     * @param mixed $antibot
     * @return array
     */
    private function checkLogForm(mixed $password, array $errors, mixed $pseudo, mixed $antibot): array
    {
        if (empty($pseudo)) {

            $errors[] = "Met donc un pseudo, qu'on sache qui tu es !";
        }

        if (empty($password)) {

            $errors[] = "T'as oublié de choisir un mot de passe !";
        }

        // REGEX FOR SECURITY VERIFICATION //

        //Minimum eight characters, at least one upper case English letter, one lower case English letter,
        //one number and one special character//

        if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/', $password)) {

            $errors[] = "Il faut que ton mot de passe ait au moins une majuscule, une minuscule, un chiffre, et un caractère spécial. Ah, et pas d'espace! Oui c'est embêtant, mais c'est pour sécuriser ton compte !";

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

    public function acceptCookie()
    {

        setcookie('accepted', '1', time() + 3600 * 24, '/', '', true, true);
        header('Location: /');;

    }

}

