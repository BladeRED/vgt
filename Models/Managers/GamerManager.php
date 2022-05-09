<?php

class GamerManager extends DBManager
{

    public function getOneByGamerName($pseudo)
    {
        $gamer = null;
        $query = $this->bdd->prepare("SELECT * from Gamer WHERE pseudo = :pseudo");
        $query->execute(["pseudo" => $pseudo]);
        $result = $query->fetch();

        if ($result) {

            $gamer = new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"]);

        }

        return $gamer;
    }

    public function create(Gamer $gamer)
    {

        $query = $this->bdd->prepare("INSERT INTO gamer(pseudo, password, mail, role) VALUES (:pseudo, :password, :mail, :role)");
        $query->execute([
            "pseudoInput" => $gamer->getPseudo(),
            "passwordInput" => password_hash($gamer->getPassword(), PASSWORD_DEFAULT),
            "mail" => $gamer->getMail(),
            "role" => "[GAMER]",
        ]);

    }

}

?>