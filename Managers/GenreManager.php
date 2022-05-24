<?php

namespace app\Managers;

use app\Models\Genre;

class GenreManager extends DBManager
{

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Genre');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $genreList[] = new Genre($result["Id_Genre"], $result["name"], $result["game_genre"]);

        }
        return $genreList;
    }

}

?>