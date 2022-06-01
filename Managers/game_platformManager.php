<?php

namespace app\Managers;
use app\Models\game_genre;
use app\Models\game_platform;


class game_platformManager extends DBManager {

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM game_platform');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $game_platformList[] = new game_platform($result["Id_Games"], $result["Id_Platforms"]);

        }
        return $game_platformList;
    }

    public function findGamePlatformById($id)
    {
        $gameplatform = null;
        $query = $this->bdd->prepare('SELECT * FROM game_platform WHERE Id_Games =:Id_Games');
        $query->execute(["Id_Games" => $id]);
        $result = $query->fetch();

        if ($result) {

            $gameplatform = new game_genre($result["Id_Games"], $result["Id_Platforms"]);

        }

        return $gameplatform;
    }

    public function add(game_platform $game_platform)
    {

        $query = $this->bdd->prepare('INSERT INTO game_platform (Id_Games,Id_Platforms) VALUES(:Id_Games, :Id_Platforms)');
        $query->execute([
            "Id_Games" => $game_platform->getIdGame(),
            "Id_Platforms" => $game_platform->getIdPlatform(),
        ]);
    }


    public function delete($id)
    {

        $query = $this->bdd->prepare('DELETE FROM game_platform WHERE Id_Games= :id');
        $query->execute([
            "id" => $id->getIdGame()
        ]);
    }


}