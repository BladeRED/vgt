<?php

namespace app\Managers;

use app\Models\Game;
use app\Models\game_genre;
use app\Models\Time;


class game_genreManager
    extends
    DBManager
{

    public function findAll()
    {

        $query =
            $this->bdd->prepare('SELECT * FROM game_genre');
        $query->execute();
        $results =
            $query->fetchAll();


        foreach ($results
                 as
                 $result)
        {

            $game_genreList[] =
                new game_genre($result["Id_Games"],
                    $result["Id_Genre"]);

        }
        return $game_genreList;
    }

    public function findGameGenreById($id)
    {
        $gamegenre =
            null;
        $query =
            $this->bdd->prepare('SELECT * FROM game_genre WHERE Id_Games =:Id_Games');
        $query->execute(["Id_Games" => $id]);
        $result =
            $query->fetch();

        if ($result) {

            $gamegenre =
                new game_genre($result["Id_Games"],
                    $result["Id_Genre"]);

        }

        return $gamegenre;
    }

    public function add(game_genre $game_genre)
    {

        $query =
            $this->bdd->prepare('INSERT INTO game_genre (Id_Games, Id_Genre) VALUES(:Id_Games, :Id_Genre)');
        $query->execute([
            "Id_Games" => $game_genre->getIdGame(),
            "Id_Genre" => $game_genre->getIdGenre(),
        ]);
    }

    public function delete($id)
    {

        $query =
            $this->bdd->prepare('DELETE FROM game_genre WHERE Id_Games= :id');
        $query->execute([
            "id" => $id->getIdGame()
        ]);
    }


}