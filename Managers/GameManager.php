<?php

namespace app\Managers;
use app\Models\Game;
use app\Models\game_genre;
use app\Models\game_platform;
use app\Models\Genre;
use app\Models\Platform;


class GameManager extends DBManager {

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Games JOIN game_genre ON Games.Id_Games = game_genre.Id_Games JOIN Genre ON Genre.Id_Genre = game_genre.Id_Genre JOIN game_platform ON Games.Id_Games = game_platform.Id_Games JOIN Platforms ON Platforms.Id_Platforms = game_platform.Id_Platforms GROUP BY Games.Id_Games;');
        $query->execute();
        $results = $query->fetchAll();

        foreach ($results as $result) {

            $gamesList[] = new Game($result["Id_Games"], $result["title"], $result["resume"], $result["released"],$result["editor"], $result["studio"], new Genre($result["Id_Genre"], $result["name"], new game_genre($result["Id_Games"], $result["Id_Genre"])), new game_genre($result["Id_Games"], $result["Id_Genre"]), new Platform($result["Id_Platforms"], $result["console"], new game_platform($result["Id_Games"], $result["Id_Platforms"])), new game_platform($result["Id_Games"], $result["Id_Platforms"]));

        }
        return $gamesList;
    }

    public function add(Game $game)
    {

        $query = $this->bdd->prepare('INSERT INTO Games (title,resume,released,editor,studio) VALUES (:title,:resume,:released,:editor, :studio); INSERT INTO game_genre (Id_Games, Id_Genre) VALUES(:Id_Games, :Id_Genre)');
        $query->execute([
            "title" => $game->getTitle(),
            "resume" => $game->getResume(),
            "released" => $game->getReleased(),
            "editor" => $game->getEditor(),
            "studio" => $game->getStudio(),
            ]);
    }





}