<?php

namespace app\Managers;

use app\Models\Gamer;
use app\Models\Genre;

class GenreManager extends DBManager
{

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Genre');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $genreList[] = new Genre($result["Id_Genre"], $result["name"], "");

        }
        return $genreList;
    }

    public function findByGenreName($name)
    {
        $genre = null;
        $query = $this->bdd->prepare("SELECT * from Genre WHERE name = :name");
        $query->execute(["name" => $name]);
        $result = $query->fetch();

        if ($result) {

            $genre = new Genre($result["Id_Genre"], $result["name"], "");

        }

        return $genre;
    }

}

?>