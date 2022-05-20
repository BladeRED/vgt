<?php

namespace app\Managers;

use app\Models\Gamer;

class GamerManager extends DBManager
{

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Gamer');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $gamerList[] = new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"], $result["picture"]);

        }
        return $gamerList;
    }

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

    public function getOneByGamerId($id)
    {
        $gamer = null;
        $query = $this->bdd->prepare('SELECT * FROM Gamer WHERE Id_Gamer =:Id_Gamer');
        $query->execute(["Id_Gamer" => $id]);
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

    public function update($gamer)
    {

        $query = $this->bdd->prepare('UPDATE Gamer SET pseudo= :pseudo, password= :password, mail= :mail, picture= :picture WHERE Id_Gamer= :id');
        $query->execute([
            "pseudo" => $gamer->getPseudo(),
            "password" => password_hash($gamer->getPassword(), PASSWORD_DEFAULT),
            "mail" => $gamer->getMail(),
            "picture" => $gamer->getPicture(),
            "id" => $gamer->getId()
        ]);

    }

}

?>