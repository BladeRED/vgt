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

            $timesList[] = new Time($result["Id_Gametimes"], $result["category"], $result["hours"], $result["minuts"], $result["seconds"], $result["Id_Games"],new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"], $result["picture"]), new Game($result["Id_Games"], $result["title"], $result["resume"],'', '','',''));

        }

        return $timesList;
    }

}