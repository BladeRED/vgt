<?php

namespace app\Managers;

use app\Models\Gamer;

class GamerManager extends DBManager
{

    public function getOneByGamerName($pseudo)
    {
        $gamer = null;
        $query = $this->bdd->prepare("SELECT * from Gamer WHERE pseudo = :pseudo");
        $query->execute(["pseudo" => $pseudo]);
        $result = $query->fetch();

        if ($result) {

            $gamer = new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"], $result["picture"]);

        }

        return $gamer;
    }

    public function create(Gamer $gamer)
    {

        $query = $this->bdd->prepare("INSERT INTO Gamer(pseudo,password,mail,role,picture) VALUES (:pseudo, :password, :mail, :role, :picture)");
        $query->execute([
            "pseudo" => $gamer->getPseudo(),
            "password" => password_hash($gamer->getPassword(), PASSWORD_DEFAULT),
            "mail" => $gamer->getMail(),
            "role" => "[GAMER]",
            "picture" => $gamer->getPicture()
        ]);

    }

}

?>