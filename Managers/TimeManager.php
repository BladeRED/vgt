<?php

namespace app\Managers;
use app\Models\Game;
use app\Models\Time;

class TimeManager extends DBManager{

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Gametimes JOIN Games ON Gametimes.Id_Games = Games.Id_Games');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $timesList[] = new Time($result["Id_Gametimes"], $result["category"], $result["hours"], $result["minuts"], $result["seconds"], $result["Id_Games"]);


        }

        return $timesList;
    }


}