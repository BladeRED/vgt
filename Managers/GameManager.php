<?php

namespace app\Managers;
use app\Models\Game;
use app\Models\Gamer;

class GameManager extends DBManager {

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Games');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $gamesList[] = new Game($result["Id_Games"], $result["title"], $result["resume"]);

        }
        return $gamesList;
    }





}