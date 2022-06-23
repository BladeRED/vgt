<?php

namespace app\Controllers;

use app\Managers\game_genreManager;
use app\Managers\game_platformManager;
use app\Managers\GameManager;
use app\Managers\GamerManager;
use app\Managers\GenreManager;
use app\Managers\PlatformManager;
use app\Managers\ReviewManager;
use app\Managers\TimeManager;
use app\Models\Game;
use app\Models\game_genre;
use app\Models\game_platform;
use app\Models\Gamer;


class AdminController
    extends
    AbstractController
{
    private GamerManager $gamermanager;
    private GameManager $gamemanager;
    private TimeManager $timemanager;
    private ReviewManager $reviewmanager;
    private GenreManager $genremanager;
    private PlatformManager $platformManager;
    private game_genreManager $game_genremanager;
    private game_platformManager $game_platformManager;


    /**
     * @param $gamermanager
     */
    public function __construct()
    {
        parent::__construct();
        $this->gamermanager =
            new GamerManager();
        $this->gamemanager =
            new GameManager();
        $this->timemanager =
            new TimeManager();
        $this->reviewmanager =
            new ReviewManager();
        $this->genremanager =
            new GenreManager();
        $this->platformManager =
            new PlatformManager();
        $this->game_genremanager =
            new game_genreManager();
        $this->game_platformManager =
            new game_platformManager();
    }

    public function dashboard()
    {

        $errors =
            [];
        $nbUsers =
            $this->gamermanager->countUsers();
        $nbGames =
            $this->gamemanager->countGames();
        $nbTimes =
            $this->timemanager->countTimes();
        $nbReviews =
            $this->reviewmanager->countReviews();


        $usersDate =
            null;
        $gamesDate =
            null;
        $timesDate =
            null;

        $histDates =
            null;
        $compDates =
            null;
        $extraDates =
            null;
        $histCateg =
            $this->timemanager->findByHistCateg();
        $compCateg =
            $this->timemanager->findByCompCateg();
        $extraCateg =
            $this->timemanager->findByExtraCateg();

        $sumTimes =
            null;
        $sumDays =
            0;
        $sumHrs =
            0;
        $sumMins =
            0;
        $sumScs =
            0;
        $totalTime =
            $this->timemanager->sumTimes();
        $reviewsTime =
            null;

        $allTimesUsers =
            $this->gamermanager->checkAllTimesUsers();
        $allNullTimesUsers =
            $this->gamermanager->checkAllNullTimesUsers();

        $dateBegin =
            null;
        $dateEnd =
            null;


        if (!empty($_POST["dateBegin"])) {
            $dateBegin =
                $_POST["dateBegin"];
            $dateEnd =
                $_POST["dateEnd"];
            if ($dateEnd <
                $dateBegin) {

                $errors[] =
                    "Veuillez saisir une période correct, car il est impossible de remonter le temps :)";

            }
            $usersDate =
                $this->gamermanager->findByDate($dateBegin,
                    $dateEnd);
            $gamesDate =
                $this->gamemanager->findByDate($dateBegin,
                    $dateEnd);
            $timesDate =
                $this->timemanager->findByDate($dateBegin,
                    $dateEnd);

            $sumTimes =
                $this->timemanager->sumByDate($dateBegin,
                    $dateEnd);
            $reviewsTime =
                $this->reviewmanager->findByDate($dateBegin,
                    $dateEnd);

            // BY DATES //
            $histDates =
                $this->timemanager->findByHistDate($dateBegin,
                    $dateEnd);
            $compDates =
                $this->timemanager->findByCompDate($dateBegin,
                    $dateEnd);
            $extraDates =
                $this->timemanager->findByExtraDate($dateBegin,
                    $dateEnd);

            //Gestion of times for template rendering//

            $sumHrs =
                $sumTimes["sumHrs"];
            $sumMins =
                $sumTimes["sumMins"];
            $sumScs =
                $sumTimes["sumScs"];

            // While our time value (hours, minuts, or seconds) exceed the limit time, we add 1 to the upper time value //

            while ($sumScs >
                59) {

                $sumScs =
                    $sumScs -
                    59;
                $sumMins += 1;

            }

            while ($sumMins >
                59) {

                $sumMins =
                    $sumMins -
                    59;
                $sumHrs += 1;

            }

            while ($sumHrs >
                23) {

                $sumHrs =
                    $sumHrs -
                    24;
                $sumDays += 1;

            }
        }

        $this->render->display('admin/dashboard.twig',
            ['errors' => $errors,
                'nbUsers' => $nbUsers,
                'nbGames' => $nbGames,
                'nbTimes' => $nbTimes,
                'nbReviews' => $nbReviews,
                'totalTime' => $totalTime,
                'dateBegin' => $dateBegin,
                'dateEnd' => $dateEnd,
                'usersDate' => $usersDate,
                'gamesDate' => $gamesDate,
                'timesDate' => $timesDate,
                'sumTimes' => $sumTimes,
                'sumDays' => $sumDays,
                'sumHrs' => $sumHrs,
                'sumMins' => $sumMins,
                'sumScs' => $sumScs,
                'reviewsTime' => $reviewsTime,
                'allTimesUsers' => $allTimesUsers,
                'allNullTimesUsers' => $allNullTimesUsers,
                'histCateg' => $histCateg,
                'extraCateg' => $extraCateg,
                'compCateg' => $compCateg,
                'histDates' => $histDates,
                'compDates' => $compDates,
                'extraDates' => $extraDates],
        );
    }

    public function findAll()
    {

        if ($_SERVER['REQUEST_URI'] ==
            '/admin/users') {

            $users =
                $this->gamermanager->findAll();
            $this->render->display('admin/users.twig',
                ['users' => $users]);

        } else {
            if ($_SERVER['REQUEST_URI'] ==
                '/admin/games') {

                $games =
                    $this->gamemanager->findAll();
                $platforms =
                    $this->platformManager->findAll();
                $genres =
                    $this->genremanager->findAll();
                $this->render->display('admin/gamesAdmin.twig',
                    ['games' => $games,
                        'platforms' => $platforms,
                        'genres' => $genres]);

            } else {
                if ($_SERVER['REQUEST_URI'] ==
                    '/admin/times') {

                    $times =
                        $this->timemanager->findAll();
                    $this->render->display('admin/times.twig',
                        ['times' => $times]);

                } else {
                    if ($_SERVER['REQUEST_URI'] ==
                        '/admin/reviews') {

                        $reviews =
                            $this->reviewmanager->findAll();
                        $this->render->display('admin/reviews.twig',
                            ['reviews' => $reviews]);

                    }
                }
            }
        }
    }

    public function add()
    {
        $errors =
            [];
        if ($_SERVER['REQUEST_METHOD'] ==
            "POST") {

            if ($_SERVER['REQUEST_URI'] ==
                '/admin/addUsers') {
                $errors =
                    $this->addUserForm();

                if (count($errors) ==
                    0) {


                    $gamer =
                        new Gamer(null,
                            $_POST["pseudoRegister"],
                            $_POST["passwordRegister"],
                            $_POST["mailRegister"],
                            "[GAMER]",
                            "../../assets/pictures/dragon.png",
                            date('Y-m-d'));
                    $this->gamermanager->create($gamer);
                } else {

                    $this->render->display('/admin/users.twig',
                        ['errors' => $errors]);

                }
                header('Location:/admin/users');

            } else {
                if ($_SERVER['REQUEST_URI'] ==
                    '/admin/addGames') {

                    $errors =
                        $this->validForm();

                    if (count($errors) ==
                        0) {

                        // Creation of a new game object  and add //

                        if (!$_POST["release"]) {

                            $game =
                                new Game (null,
                                    $_POST["titleInput"],
                                    $_POST["resumeInput"],
                                    null,
                                    $_POST["studio"],
                                    $_POST["editor"],
                                    "",
                                    "",
                                    "",
                                    "",
                                    "",
                                    "",
                                    date('Y-m-d'),
                                    "../../assets/pictures/Elden_Ring.jpg");

                        } else {

                            $game =
                                new Game (null,
                                    $_POST["titleInput"],
                                    $_POST["resumeInput"],
                                    $_POST["release"],
                                    $_POST["studio"],
                                    $_POST["editor"],
                                    "",
                                    "",
                                    "",
                                    "",
                                    "",
                                    "",
                                    date('Y-m-d'),
                                    "../../assets/pictures/Elden_Ring.jpg");

                        }
                        $this->gamemanager->add($game);


                        // We get the genre and the platform based on the input values
                        $genre =
                            $this->genremanager->findByGenreName($_POST["genres"]);
                        $platform =
                            $this->platformManager->findByPlatformConsole($_POST["platforms"]);

                        // Find the newly created game, creation of relation tables objects  //
                        $game =
                            $this->gamemanager->findByGameTitle($_POST["titleInput"]);

                        $game_genre =
                            new game_genre($game->getId(),
                                $genre->getId());
                        $game_platform =
                            new game_platform($game->getId(),
                                $platform->getId());

                        // Add the relation in the relation tables //

                        $this->game_genremanager->add($game_genre);
                        $this->game_platformManager->add($game_platform);


                    }
                    header('Location:/admin/games');

                } else {
                    if ($_SERVER['REQUEST_URI'] ==
                        '/admin/addTimes') {
                        $times =
                            $this->timemanager->findAll();
                        $this->render->display('admin/times.twig',
                            ['times' => $times]);
                    } else {
                        if ($_SERVER['REQUEST_URI'] ==
                            '/admin/addReviews') {
                            $reviews =
                                $this->reviewmanager->findAll();
                            $this->render->display('admin/reviews.twig',
                                ['reviews' => $reviews]);
                        }
                    }
                }
            }
        }
    }

    public function delete($id)
    {

        if ($_SERVER["REQUEST_URI"] ==
            "/admin/deleteUsers/$id") {

            $deleteGamer =
                $this->gamermanager->findbyGamerId($id);
            $this->gamermanager->delete($deleteGamer);
            header('Location:/admin/users');

        } else {
            if ($_SERVER["REQUEST_URI"] ==
                "/admin/deleteGames/$id") {

                // Before delete the game, we need to delete all datas linked to it, such as times, or relation tables //

                $deleteGame =
                    $this->gamemanager->findByGameId($id);

                $deleteTimeByGame =
                    $this->timemanager->findTimeByGameId($id);

                // We delete only if we find a time registered for a game //
                if ($deleteTimeByGame) {
                    $this->timemanager->delete($deleteTimeByGame);
                }
                $deleteGenreGame =
                    $this->game_genremanager->findGameGenreById($id);
                $this->game_genremanager->delete($deleteGenreGame);

                $deletePlatformGame =
                    $this->game_platformManager->findGamePlatformById($id);
                $this->game_platformManager->delete($deletePlatformGame);

                $this->gamemanager->delete($deleteGame);
                header('Location:/admin/games');

            } else {
                if ($_SERVER["REQUEST_URI"] ==
                    "/admin/deleteTimes/$id") {

                    $deleteTime =
                        $this->timemanager->getOnebyTimeId($id);
                    $this->timemanager->delete($deleteTime);
                    header('Location:/admin/times');
                } else {
                    if ($_SERVER["REQUEST_URI"] ==
                        "/admin/deleteReviews/$id") {

                        $deleteReview =
                            $this->reviewmanager->getOnebyReviewId($id);
                        $this->reviewmanager->delete($deleteReview);
                        header('Location:/admin/reviews');

                    }
                }
            }
        }
    }

    public function edit($id)
    {

        // Creation of an error table //
        $errors =
            [];
        $editGamer =
            $this->gamermanager->findByGamerId($id);


        if ($_SERVER["REQUEST_METHOD"] ==
            "POST") {
            // We call the verification function to see if there is errors on the form //
            $errors =
                $this->editGamerForm($errors);
            // if not, we upload and edit the account informations //

            //UPLOAD//
            if (count($errors) ==
                0 &&
                $_FILES["pictureFile"]["error"] !=
                4) {

                $upload =
                    $this->uploadPicture($errors);
                $uniqFileName =
                    $upload["filename"];
                $errors =
                    $upload["errors"];

            } else {
                $uniqFileName =
                    $editGamer->getPicture();
            }

            //EDIT AND REGISTER IN DATABASE//

            if (count($errors) ==
                0) {
                $editGamer->setMail($_POST["mailEdit"]);
                $editGamer->setPseudo($_POST["pseudoEdit"]);
                $editGamer->setPassword($_POST["passwordEdit"]);
                $editGamer->setPicture($uniqFileName);

                $this->gamermanager->update($editGamer);
                header("Location:/admin/users");
            }
        };
    }

    public function ajaxModal($id)
    {

        $users =
            $this->gamermanager->findByGamerId($id);
        $users =
            $users->toArray();
        echo(json_encode($users));


    }

// FORMS //

    public function validForm()
    {

        $errors =
            [];

        $title =
            $_POST["titleInput"];
        $resume =
            $_POST["resumeInput"];
        $studio =
            $_POST["studio"];
        $editor =
            $_POST["editor"];

        if (empty($title)) {

            $errors[] =
                "Vous n'avez pas saisi de titre";

        }

        if (empty($resume)) {

            $errors[] =
                "Vous n'avez pas saisi de résumé";

        }

        if (empty($studio)) {

            $errors[] =
                "Vous n'avez saisi aucun studio";

        }

        if (empty($editor)) {

            $errors[] =
                "Vous n'avez saisi aucun studio";

        }

        return $errors;

    }

    private
    function addUserForm(): array
    {

        $errors =
            [];

        $password =
            $_POST["passwordRegister"];
        $verifPassword =
            $_POST["passwordVerifRegister"];
        $pseudo =
            $_POST["pseudoRegister"];
        $mail =
            $_POST["mailRegister"];
        $antibot =
            $_POST["botPrevention"];

        if (empty($verifPassword)) {

            $errors[] =
                "Vérifie que t'as bien écrit ton mot de passe, quand même.";
        }

        if ($password !=
            $verifPassword) {

            $errors[] =
                "C'est pas le même mot de passe !";
        }

        if (empty($mail)) {

            $errors[] =
                "Laisse nous ton mail, promis on t'enverra (peut-être) pas de bêtises.";
        }

        return $this->checkLogForm($password,
            $errors,
            $pseudo,
            $antibot);
    }

    public
    function editGamerForm($errors)
    {

        $errors =
            [];
        if (empty($_POST["pseudoEdit"])) {

            $errors[] =
                "Nouveau pseudo, nouvelle vie !";
        }

        if (empty($_POST["passwordEdit"])) {

            $errors[] =
                "Nouveau mot de passe, attention confond pas avec l'ancien!";
        }

        if (empty($_POST["verifPasswordEdit"])) {

            $errors[] =
                "Pour être sûr que tu confond pas avec l'ancien :)";
        }

        if ($_POST["passwordEdit"] !=
            $_POST["verifPasswordEdit"]) {

            $errors[] =
                "T'as ptet confondu avec l'ancien :) :)";
        }

        if (empty($_POST["mailEdit"])) {

            $errors[] =
                "Il nous faut toujours un mail, au cas où.";
        }


        return $errors;

    }

    /**
     * @param mixed $password
     * @param array $errors
     * @param mixed $pseudo
     * @param mixed $antibot
     * @return array
     */
    private
    function checkLogForm(mixed $password,
                          array $errors,
                          mixed $pseudo,
                          mixed $antibot): array
    {
        if (empty($pseudo)) {

            $errors[] =
                "Met donc un pseudo, qu'on sache qui tu es !";
        }

        if (empty($password)) {

            $errors[] =
                "T'as oublié de choisir un mot de passe !";
        }

        // REGEX FOR SECURITY VERIFICATION //

        //Minimum eight characters, at least one upper case English letter, one lower case English letter,
        //one number and one special character//

        if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/',
            $password)) {

            $errors[] =
                "Il faut que ton mot de passe ait au moins une majuscule, une minuscule, un chiffre, et un caractère spécial. Oui c'est embêtant, mais c'est pour sécuriser ton compte !";

        }

        if (!preg_match('#[a-z\d_-]{5,15}#',
            $pseudo)) {
            $errors[] =
                "Ton pseudo doit contenir entre 5 et 15 caractères, sans espace";

        }

        if (preg_match('#\s#',
                $pseudo) ||
            preg_match('#\s#',
                $password)) {
            $errors[] =
                "Sans espace, on a dit !";

        }

        //ANTIBOT//

        if (!empty($antibot)) {

            $errors[] =
                "Bien tenté, le bot, bien tenté.";

        }


        return $errors;
    }

    public
    function uploadPicture($errors)
    {

        if ($_FILES["pictureFile"]["error"] !=
            0) {
            $errors[] =
                'Une erreur dans l\'upload';
        }
        $types =
            ["image/jpeg",
                "image/png"];
        if (!in_array($_FILES["pictureFile"]["type"],
            $types)) {
            $errors[] =
                'Jpg ou PNG en format d\'image s\'il te plaît!';
        }

        if ($_FILES["pictureFile"]["size"] >
            3 *
            1048576) {
            $errors[] =
                'Le fichier ne doit pas dépasser 3 Mo';
        }

        if (count($errors) ==
            0) {
            $extension =
                explode("/",
                    $_FILES["pictureFile"]["type"])[1];
            $uniqFilename =
                uniqid() .
                '.' .
                $extension;
            move_uploaded_file($_FILES["pictureFile"]["tmp_name"],
                'assets/pictures/' .
                $uniqFilename);
        }

        return ["errors" => $errors,
            'filename' => $uniqFilename];
    }


}


