<?php

namespace app\Controllers;

use app\Managers\GameManager;
use app\Managers\GenreManager;
use app\Managers\PlatformManager;
use app\Models\Gamer;
use app\Managers\GamerManager;

class DefaultController extends AbstractController
{
    private GamerManager $gamermanager;
    private GameManager $gamemanager;
    private PlatformManager $platformManager;
    private GenreManager $genremanager;

    /**
     * @param $gamermanager
     */


    public function __construct()
    {
        parent::__construct();
        $this->gamermanager = new GamerManager();
        $this->gamemanager = new GameManager();
        $this->platformManager = new PlatformManager();
        $this->genremanager = new GenreManager();
    }

    public function displayHomepage()
    {
        $games = $this->gamemanager->findAll();
        $this->render->display('default/homepage.twig', ['games' => $games]);
    }

    public function displayGame($id)
    {
        $games = $this->gamemanager->findAll();
        $game = $this->gamemanager->findByGameId($id);
        $platforms = $this->platformManager->findAll();
        $genres = $this->genremanager->findAll();
        $this->render->display('default/game.twig', ['game' => $game,'games'=>$games, 'platforms' =>$platforms, 'genres' =>$genres]);
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
                $gamer = new Gamer(null, $_POST["pseudoRegister"], $_POST["passwordRegister"], $_POST["mailRegister"], "[GAMER]", "../../assets/pictures/dragon.png", date("Y-m-d"));

                $this->gamermanager->create($gamer);
                $this->gamermanager = new GamerManager();
                header('Location: /');

            }

        }

        $this->render->display('default/login.twig', ['errors' => $errors]);
    }

    public function search()
    {

        $searchResult = trim($_POST["searchResult"]);

        if (strlen($searchResult) >= 0 && strlen($searchResult) <= 2) {
            $searches = null;
            $this->render->display('default/gameslist.twig', ['searches' => $searches]);
        } else {
            $searches = $this->gamemanager->search($searchResult);

            if (empty($searches)) {
                $searches = null;
                $this->render->display('default/gameslist.twig', ['searches' => $searches]);

            } else {
                $searches = json_encode($searches);
                $this->render->display('default/gameslist.twig', ['searches' => $searches]);
            }
        }
    }

    public function searchInput()
    {

        $searchResult = trim($_POST["searchResult"]);


        if (strlen($searchResult) >= 0 && strlen($searchResult) <= 2) {
            $searches = null;
            echo($searches);

        } else {
            $searches = $this->gamemanager->search($searchResult);

            if (!$searches) {
                $searches = null;

            }
                $searches = json_encode($searches);
                echo($searches);

        }
    }

    public function submitInput()
    {

        $submitResult = trim($_POST["submitResult"]);


        if (strlen($submitResult) >= 0 && strlen($submitResult) <= 2) {
            $searches = null;
            echo($searches);

        } else {
            $searches = $this->gamemanager->search($submitResult);

            if (!$searches) {
                $searches = null;

            }
            $searches = json_encode($searches);
            echo($searches);

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

