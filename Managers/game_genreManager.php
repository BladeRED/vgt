<?php

namespace app\Managers;
use app\Models\game_genre;


class game_genreManager extends DBManager {

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM game_genre');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $game_genreList[] = new game_genre($result["Id_Games"], $result["Id_Genre"]);

        }
        return $game_genreList;
    }





}