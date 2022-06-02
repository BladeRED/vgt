<?php

namespace app\Managers;

use app\Models\Game;
use app\Models\game_genre;
use app\Models\Gamer;
use app\Models\Genre;
use app\Models\Time;

class TimeManager extends DBManager
{

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Gametimes JOIN Gamer ON Gametimes.Id_Gamer = Gamer.Id_Gamer JOIN Games ON Gametimes.Id_Games = Games.Id_Games;');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $timesList[] = new Time($result["Id_Gametimes"], $result["category"], $result["hours"], $result["minuts"], $result["seconds"], $result["Id_Games"],new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"], $result["picture"], $result["registerDate"]), new Game($result["Id_Games"], $result["title"], $result["resume"],$result["released"], $result["editor"], $result["studio"], '', '', '', '', ', ', '', $result["addDate"]));

        }

        return $timesList;
    }

    public function getOneByTimeId($id)
    {
        $time = null;
        $query = $this->bdd->prepare('SELECT * FROM Gametimes WHERE Id_Gametimes =:Id_Gametimes');
        $query->execute(["Id_Gametimes" => $id]);
        $result = $query->fetch();

        if ($result) {

            $time = new Time($result["Id_Gametimes"], $result["category"], $result["hours"], $result["minuts"], $result["seconds"], $result["Id_Games"], $result["Id_Gamer"],$result["Id_Games"]);

        }

        return $time;
    }

    public function findTimeByGameId($id)
    {
        $time = null;
        $query = $this->bdd->prepare('SELECT * FROM Gametimes WHERE Id_Games =:Id_Games');
        $query->execute(["Id_Games" => $id]);
        $result = $query->fetch();

        if ($result) {

            $time = new Time($result["Id_Gametimes"], $result["category"], $result["hours"], $result["minuts"], $result["seconds"], $result["Id_Games"], $result["Id_Gamer"],$result["Id_Games"]);

        }

        return $time;
    }

    public function countTimes(){

        $query = $this->bdd->prepare('SELECT COUNT(*)AS TotalTimes FROM Gametimes;');
        $query->execute();
        $nbTimes = $query->fetch(\PDO::FETCH_ASSOC);
        return $nbTimes['TotalTimes'];

    }

    public function sumTimes(){

        $query = $this->bdd->prepare('SELECT SUM(hours) AS totalhours , SUM(minuts) AS totalminuts, SUM(seconds) AS totalseconds FROM Gametimes;');
        $query->execute();
        $dataTimes = $query->fetch(\PDO::FETCH_ASSOC);


        return $dataTimes;

    }

    public function delete($time)
    {

        $query = $this->bdd->prepare('DELETE FROM Gametimes WHERE Id_Gametimes= :id');
        $query->execute([
            "id" => $time->getId()
        ]);
    }

    public function deleteByGame($game)
    {

        $query = $this->bdd->prepare('DELETE FROM Gametimes WHERE Id_Games= :id');
        $query->execute([
            "id" => $game->getId()
        ]);
    }

}