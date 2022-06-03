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

            $gamerList[] = new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"], $result["picture"], $result["registerDate"]);

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

            $gamer = new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"], $result["picture"], $result["registerDate"]);

        }

        return $gamer;
    }

    public function findByGamerId($id)
    {
        $gamer = null;
        $query = $this->bdd->prepare('SELECT * FROM Gamer WHERE Id_Gamer =:Id_Gamer');
        $query->execute(["Id_Gamer" => $id]);
        $result = $query->fetch();

        if ($result) {

            $gamer = new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"], $result["picture"], $result["registerDate"]);

        }

        return $gamer;
    }

    public function findByDate($dateBegin,$dateEnd)
    {
        $query = $this->bdd->prepare('SELECT COUNT(*) AS nbGamers FROM Gamer WHERE registerDate >=:dateBegin AND registerDate < :dateEnd');
        $query->execute(["dateBegin" => $dateBegin,
            "dateEnd" => $dateEnd]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result['nbGamers'];
    }

    public function checkAllTimesUsers(){

        $query = $this->bdd->prepare('SELECT COUNT(DISTINCT pseudo) AS nbGamerTime FROM Gamer JOIN Gametimes ON Gamer.Id_Gamer = Gametimes.Id_Gamer;');
        $query->execute();
        $results = $query->fetch(\PDO::FETCH_ASSOC);


        return $results["nbGamerTime"];

    }

    public function countUsers(){

        $query = $this->bdd->prepare('SELECT COUNT(*)AS TotalUsers FROM Gamer;');
        $query->execute();
        $nbGamers = $query->fetch(\PDO::FETCH_ASSOC);
        return $nbGamers['TotalUsers'];

    }

    public function create(Gamer $gamer)
    {

        $query = $this->bdd->prepare("INSERT INTO Gamer(pseudo,password,mail,role,picture, registerDate) VALUES (:pseudo, :password, :mail, :role, :picture, :registerDate)");
        $query->execute([
            "pseudo" => $gamer->getPseudo(),
            "password" => password_hash($gamer->getPassword(), PASSWORD_DEFAULT),
            "mail" => $gamer->getMail(),
            "role" => "[GAMER]",
            "picture" => $gamer->getPicture(),
            "registerDate"=> $gamer->getRegisterdate()
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

    public function delete($gamer)
    {

        $query = $this->bdd->prepare('DELETE FROM Gamer WHERE Id_Gamer= :id');
        $query->execute([
            "id" => $gamer->getId()
        ]);
    }

}

?>