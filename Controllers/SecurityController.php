<?php

class SecurityController
{

    private GamerManager $gamermanager;


    /**
     * @param $gamermanager
     */
    public function __construct()
    {
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
                    header("Location: index.php?controller=default&action=homepage");

                } elseif (!is_null($gamer) && password_verify($_POST["passwordInput"], $gamer->getPassword()) && $gamer->getRole() == "[GAMER]") {
                    $_SESSION["gamer"] = serialize($gamer);
                    header("Location: index.php?controller=default&action=homepage");
                } else {
                    $errors[] = "IDENTIFIANTS INCORRECT";
                }
            }
        };

        require 'templates/login/login.php';
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
}


?>