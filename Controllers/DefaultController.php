<?php

namespace app\Controllers;

use app\Managers\GameManager;
use app\Managers\GenreManager;
use app\Managers\PlatformManager;
use app\Managers\TimeManager;
use app\Models\Gamer;
use app\Managers\GamerManager;

class DefaultController extends AbstractController
{
    private GamerManager $gamermanager;
    private GameManager $gamemanager;
    private PlatformManager $platformManager;
    private GenreManager $genremanager;
    private TimeManager $timemanager;

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
        $this->timemanager = new TimeManager();
    }

    public function displayHomepage()
    {

        $dateToday = date('Y-m-d');
        $dateLastWeek = date('Y-m-d', time() - 60 * 60 * 168);
        $games = $this->gamemanager->findAll();

        $gamesTimesAvg = $this->timemanager->findAvgTimeByGame();

        $EldenRing = $gamesTimesAvg[0];




        $todayGame = $this->gamemanager->findByTodayDate($dateToday, $dateLastWeek);
        $todayTime = $this->timemanager->findByTodayDate($dateToday, $dateLastWeek);
        $todayGamer = $this->gamermanager->findByTodayDate($dateToday, $dateLastWeek);

        $this->render->display('default/homepage.twig',
            ['games' => $games,
                'todayGame' => $todayGame,
                'todayTime' => $todayTime,
                'todayGamer' => $todayGamer,
                'gamesTimesAvg' => $gamesTimesAvg,
                'EldenRing' => $EldenRing]
        );
    }

    public function displayGame($id)
    {
        $games = $this->gamemanager->findAll();
        $game = $this->gamemanager->findByGameId($id);
        $platforms = $this->platformManager->findAll();
        $genres = $this->genremanager->findAll();
        $timeGame = $this->timemanager->findAvgTimeByGameId($id);
        $histTimeGame = $this->timemanager->findHistAvgTimeByGameId($id);
        $extraTimeGame = $this->timemanager->findExtraAvgTimeByGameId($id);
        $compTimeGame = $this->timemanager->findCompAvgTimeByGameId($id);

        // We take the value of our array timeGame into variables, and we treat them for rendering the good time display //

        //ALL //
        $timeDays = 0;
        $timeHrs = $timeGame["Hours"];
        $timeMins = $timeGame["Minuts"];
        $timeSecs = $timeGame["Seconds"];

        //History//

        $histTimeDays = 0;
        $histTimeHrs = $histTimeGame["Hours"];
        $histTimeMins = $histTimeGame["Minuts"];
        $histTimeSecs = $histTimeGame["Seconds"];

        //History+Extras//

        $extraTimeDays = 0;
        $extraTimeHrs = $extraTimeGame["Hours"];
        $extraTimeMins = $extraTimeGame["Minuts"];
        $extraTimeSecs = $extraTimeGame["Seconds"];

        //Completionist//

        $compTimeDays = 0;
        $compTimeHrs = $compTimeGame["Hours"];
        $compTimeMins = $compTimeGame["Minuts"];
        $compTimeSecs = $compTimeGame["Seconds"];


        while ($timeSecs > 59) {

            $timeSecs = $timeSecs - 59;
            $timeMins += 1;

        }

        while ($timeMins > 59) {

            $timeMins = $timeMins - 59;
            $timeHrs += 1;

        }

        while ($timeHrs > 23) {

            $timeHrs = $timeHrs - 24;
            $timeDays += 1;

        }

        //History//

        while ($histTimeSecs > 59) {

            $histTimeSecs = $histTimeSecs - 59;
            $histTimeMins += 1;

        }

        while ($histTimeMins > 59) {

            $histTimeMins = $histTimeMins - 59;
            $histTimeHrs += 1;

        }

        while ($histTimeHrs > 23) {

            $histTimeHrs = $histTimeHrs - 24;
            $histTimeDays += 1;

        }

        //History+Extras//

        while ($extraTimeSecs > 59) {

            $extraTimeSecs = $extraTimeSecs - 59;
            $extraTimeMins += 1;

        }

        while ($extraTimeMins > 59) {

            $extraTimeMins = $extraTimeMins - 59;
            $extraTimeHrs += 1;

        }

        while ($extraTimeHrs > 23) {

            $extraTimeHrs = $extraTimeHrs - 24;
            $extraTimeDays += 1;

        }

        //Completionist//

        while ($compTimeSecs > 59) {

            $compTimeSecs = $compTimeSecs - 59;
            $compTimeMins += 1;

        }

        while ($compTimeMins > 59) {

            $compTimeMins = $compTimeMins - 59;
            $compTimeHrs += 1;

        }

        while ($compTimeHrs > 23) {

            $compTimeHrs = $compTimeHrs - 24;
            $compTimeDays += 1;

        }

        $this->render->display('default/game.twig',
            ['game' => $game, 'games' => $games,
                'platforms' => $platforms,
                'genres' => $genres,
                'timeGame' => $timeGame,
                'timeDays' => $timeDays,
                'timeHrs' => $timeHrs,
                'timeMins' => $timeMins,
                'timeSecs' => $timeSecs,
                'histTimeDays' => $histTimeDays,
                'histTimeHrs' => $histTimeHrs,
                'histTimeMins' => $histTimeMins,
                'histTimeSecs' => $histTimeSecs,
                'extraTimeDays' => $extraTimeDays,
                'extraTimeHrs' => $extraTimeHrs,
                'extraTimeMins' => $extraTimeMins,
                'extraTimeSecs' => $extraTimeSecs,
                'compTimeDays' => $compTimeDays,
                'compTimeHrs' => $compTimeHrs,
                'compTimeMins' => $compTimeMins,
                'compTimeSecs' => $compTimeSecs,
            ]);
    }

    public function displayLogin()
    {

        $this->render->display('default/login.twig');
    }

    public function displayPolitique()
    {

        $this->render->display('default/politique.twig');
    }

    public function displayMentions()
    {

        $this->render->display('default/mentions.twig');
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

