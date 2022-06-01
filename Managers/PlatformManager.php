<?php

namespace app\Managers;

use app\Models\Genre;
use app\Models\Platform;

class PlatformManager extends DBManager
{

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Platforms');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $platformList[] = new Platform($result["Id_Platforms"], $result["console"], "");

        }
        return $platformList;
    }

    public function findByPlatformConsole($console)
    {
        $genre = null;
        $query = $this->bdd->prepare("SELECT * from Platforms WHERE console = :console");
        $query->execute(["console" => $console]);
        $result = $query->fetch();

        if ($result) {

            $genre = new Platform($result["Id_Platforms"], $result["console"], "");

        }

        return $genre;
    }

}

?>