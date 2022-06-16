<?php

namespace app\Controllers;

use app\Managers\GamerManager;
use app\Managers\TimeManager;
use app\Models\Game;
use app\Models\Time;


class SecurityController extends AbstractController
{
    private GamerManager $gamermanager;
    private  TimeManager $timemanager;


    /**
     * @param $gamermanager
     */
    public function __construct()
    {
        parent::__construct();
        $this->gamermanager = new GamerManager();
        $this->timemanager= new TimeManager();

    }

    public function logout()
    {
//logout the session
        session_destroy();
        header("Location: /");
    }

    public function submitTime()
    {
        $redirect= $_SERVER['HTTP_REFERER'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $time = new Time(null,$_POST["categories"],$_POST["hours"], $_POST["minuts"], $_POST["seconds"], $_POST["idSubmitGame"],$this->sessionService->gamer->getId(),"", date("Y-m-d"));


        }

        $this->timemanager->add($time);

        header("Location: $redirect");
    }


    public function displayGamer()
    {

        $this->render->display('security/gamer.twig');
    }

    // Upload pictureFiles //

    public function uploadPicture($errors)
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
            move_uploaded_file($_FILES["pictureFile"]["tmp_name"],'assets/pictures/'.$uniqFilename);
        }

        return ["errors" => $errors, 'filename' => $uniqFilename];
    }

    // Edit and Delete Gamer //

    public function editGamer()
    {

        // Creation of an error table //
        $errors = [];
        $editGamer = $this->gamermanager->findByGamerId($this->sessionService->gamer->getId());


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // We call the verification function to see if there is errors on the form //
            $errors = $this->isValidEditGamerForm($errors);
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

                $this->gamermanagdisplaySer->update($editGamer);

                $this->sessionService->gamer = serialize($editGamer);
                session_write_close();
                header("Location: /security/gamer");
            }
        };
    }

    public function isValidEditGamerForm($errors)
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

            $errors[] = "T'as peut-être confondu avec l'ancien :) :)";
        }

        if (empty($_POST["mailEdit"])) {

            $errors[] = "Il nous faut toujours un mail, au cas où.";
        }


        return $errors;

    }
}


