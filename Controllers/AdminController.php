<?php

namespace app\Controllers;

use app\Managers\GameManager;
use app\Managers\GamerManager;
use app\Managers\ReviewManager;
use app\Managers\TimeManager;
use app\Models\Game;
use app\Models\Gamer;
use app\Services\sessionService;

class AdminController extends AbstractController
{
    private GamerManager $gamermanager;
    private GameManager $gamemanager;
    private TimeManager $timemanager;
    private ReviewManager $reviewmanager;


    /**
     * @param $gamermanager
     */
    public function __construct()
    {
        parent::__construct();
        $this->gamermanager = new GamerManager();
        $this->gamemanager = new GameManager();
        $this->timemanager = new TimeManager();
        $this->reviewmanager = new ReviewManager();
    }

    public function dashboard()
    {
        $this->render->display('admin/dashboard.twig');

    }

    public function findAll()
    {

        if ($_SERVER['REQUEST_URI'] == '/admin/users') {
            $users = $this->gamermanager->findAll();
            $this->render->display('admin/users.twig', ['users' => $users]);
        } else if ($_SERVER['REQUEST_URI'] == '/admin/games') {
            $games = $this->gamemanager->findAll();
            $this->render->display('admin/gamesAdmin.twig', ['games' => $games]);
        } else if ($_SERVER['REQUEST_URI'] == '/admin/times') {
            $times = $this->timemanager->findAll();
            $this->render->display('admin/times.twig', ['times' => $times]);
        } else if ($_SERVER['REQUEST_URI'] == '/admin/reviews') {
            $reviews = $this->reviewmanager->findAll();
            $this->render->display('admin/reviews.twig', ['reviews' => $reviews]);
        }
    }

    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if ($_SERVER['REQUEST_URI'] == '/admin/addUsers') {
                $errors = $this->addUserForm();

                if (count($errors) == 0) {

                    $gamer = new Gamer(null, $_POST["pseudoRegister"], $_POST["passwordRegister"], $_POST["mailRegister"], "[GAMER]", "../../assets/pictures/dragon.png");
                    $this->gamermanager->create($gamer);
                }
                header('Location:/admin/users');

            } else if ($_SERVER['REQUEST_URI'] == '/admin/addGames') {

                $errors = $this->validForm();

                if (count($errors) == 0) {

                    $game = new Game (null, $_POST["titleInput"], $_POST["resumeInput"], "RPG", "2", "PS4", "4");
                    $this->gamemanager->add($game);
                }
                header('Location:/admin/games');

            } else if ($_SERVER['REQUEST_URI'] == '/admin/addTimes') {
                $times = $this->timemanager->findAll();
                $this->render->display('admin/times.twig', ['times' => $times]);
            } else if ($_SERVER['REQUEST_URI'] == '/admin/addReviews') {
                $reviews = $this->reviewmanager->findAll();
                $this->render->display('admin/reviews.twig', ['reviews' => $reviews]);
            }
        }
    }

    public function delete($id)
    {
        if ($_SERVER["REQUEST_URI"] == "/admin/deleteUsers/$id") {

            $deleteGamer = $this->gamermanager->findbyGamerId($id);
            $this->gamermanager->delete($deleteGamer);
            header('Location:/admin/users');
        } else if ($_SERVER["REQUEST_URI"] == "/admin/deleteTimes/$id") {

            $deleteTime = $this->timemanager->getOnebyTimeId($id);
            $this->timemanager->delete($deleteTime);
            header('Location:/admin/times');
        } else if ($_SERVER["REQUEST_URI"] == "/admin/deleteReviews/$id"){

            $deleteReview = $this->reviewmanager->getOnebyReviewId($id);
            $this->reviewmanager->delete($deleteReview);
            header('Location:/admin/reviews');

        }
    }

    public function edit($id)
    {

        // Creation of an error table //
        $errors = [];
        $editGamer = $this->gamermanager->findByGamerId($id);


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // We call the verification function to see if there is errors on the form //
            $errors = $this->editGamerForm($errors);
            // if not, we upload and edit the account informations //

            //UPLOAD//
            if (count($errors) == 0 && $_FILES["pictureFile"]["error"] != 4) {

                $upload = $this->uploadPicture($errors);
                $uniqFileName = $upload["filename"];
                $errors = $upload["errors"];

            } else {
                $uniqFileName = $editGamer->getPicture();
            }

            //EDIT AND REGISTER IN DATABASE//

            if (count($errors) == 0) {
                $editGamer->setMail($_POST["mailEdit"]);
                $editGamer->setPseudo($_POST["pseudoEdit"]);
                $editGamer->setPassword($_POST["passwordEdit"]);
                $editGamer->setPicture($uniqFileName);

                $this->gamermanager->update($editGamer);
                header("Location:/admin/users");
            }
        };
    }

    public function ajaxModal($id){

        $users = $this->gamermanager->findByGamerId($id);
        $users = $users->toArray();
        echo(json_encode($users));


    }

// FORMS //

    public function validForm()
    {

        $errors = [];

        $title = $_POST["titleInput"];
        $resume = $_POST["resumeInput"];

        if (empty($title)) {

            $errors[] = "Vous n'avez pas saisi de titre";

        }

        if (empty($resume)) {

            $errors[] = "Vous n'avez pas saisi de résumé";

        }

        return $errors;

    }

    private
    function addUserForm(): array
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

    public
    function editGamerForm($errors)
    {

        $errors = [];
        if (empty($_POST["pseudoEdit"])) {

            $errors[] = "Nouveau pseudo, nouvelle vie !";
        }

        if (empty($_POST["passwordEdit"])) {

            $errors[] = "Nouveau mot de passe, attention confond pas avec l'ancien!";
        }

        if (empty($_POST["verifPasswordEdit"])) {

            $errors[] = "Pour être sûr que tu confond pas avec l'ancien :)";
        }

        if ($_POST["passwordEdit"] != $_POST["verifPasswordEdit"]) {

            $errors[] = "T'as ptet confondu avec l'ancien :) :)";
        }

        if (empty($_POST["mailEdit"])) {

            $errors[] = "Il nous faut toujours un mail, au cas où.";
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
    function checkLogForm(mixed $password, array $errors, mixed $pseudo, mixed $antibot): array
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

    public
    function uploadPicture($errors)
    {

        if ($_FILES["pictureFile"]["error"] != 0) {
            $errors[] = 'Une erreur dans l\'upload';
        }
        $types = ["image/jpeg", "image/png"];
        if (!in_array($_FILES["pictureFile"]["type"], $types)) {
            $errors[] = 'Jpg ou PNG en format d\'image s\'il te plaît!';
        }

        if ($_FILES["pictureFile"]["size"] > 3 * 1048576) {
            $errors[] = 'Le fichier ne doit pas dépasser 3 Mo';
        }

        if (count($errors) == 0) {
            $extension = explode("/", $_FILES["pictureFile"]["type"])[1];
            $uniqFilename = uniqid() . '.' . $extension;
            move_uploaded_file($_FILES["pictureFile"]["tmp_name"], 'assets/pictures/' . $uniqFilename);
        }

        return ["errors" => $errors, 'filename' => $uniqFilename];
    }

}


