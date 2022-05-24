<?php

namespace app\Managers;

use app\Models\Platform;

class PlatformManager extends DBManager
{

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Platforms');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $platformList[] = new Platform($result["Id_Genre"], $result["console"], $result["game_genre"]);

        }
        return $platformList;
    }

}

?>