<?php

namespace app\Managers;

use app\Models\Game;
use app\Models\game_genre;
use app\Models\game_platform;
use app\Models\Gamer;
use app\Models\Genre;
use app\Models\Platform;


class GameManager
    extends
    DBManager
{

    public function findAll()
    {

        $query =
            $this->bdd->prepare('SELECT DISTINCT Games.Id_Games, `title`, `resume`, `released`, `editor`, `studio`,`picture`, GROUP_CONCAT( DISTINCT Genre.name) AS Genres, GROUP_CONCAT( Distinct Platforms.console)AS Plateformes, Genre.*, Platforms.* FROM Games JOIN game_genre ON Games.Id_Games = game_genre.Id_Games JOIN Genre ON Genre.Id_Genre = game_genre.Id_Genre JOIN game_platform ON Games.Id_Games = game_platform.Id_Games JOIN Platforms ON Platforms.Id_Platforms = game_platform.Id_Platforms GROUP BY Games.Id_Games;');
        $query->execute();
        $results =
            $query->fetchAll();

        foreach ($results
                 as
                 $result)
        {

            $gamesList[] =
                new Game($result["Id_Games"],
                    $result["title"],
                    $result["resume"],
                    $result["released"],
                    $result["editor"],
                    $result["studio"],
                    new Genre($result["Id_Genre"],
                        $result["name"],
                        new game_genre($result["Id_Games"],
                            $result["Id_Genre"])),
                    new game_genre($result["Id_Games"],
                        $result["Id_Genre"]),
                    new Platform($result["Id_Platforms"],
                        $result["console"],
                        new game_platform($result["Id_Games"],
                            $result["Id_Platforms"])),
                    new game_platform($result["Id_Games"],
                        $result["Id_Platforms"]),
                    $result["Genres"],
                    $result["Plateformes"],
                    "",
                    $result["picture"]);

        }
        return $gamesList;
    }

    public function findByGameTitle($title)
    {
        $game =
            null;
        $query =
            $this->bdd->prepare("SELECT * from Games WHERE title = :title");
        $query->execute(["title" => $title]);
        $result =
            $query->fetch();

        if ($result) {

            $game =
                new Game($result["Id_Games"],
                    $result["title"],
                    $result["resume"],
                    $result["released"],
                    $result["editor"],
                    $result["studio"],
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    $result["picture"]);

        }

        return $game;
    }

    public function findByGameId($id)
    {
        $game =
            null;
        $query =
            $this->bdd->prepare("SELECT DISTINCT Games.Id_Games, `title`, `resume`, `released`, `editor`, `studio`,`picture`, GROUP_CONCAT( DISTINCT Genre.name) AS Genres, GROUP_CONCAT( Distinct Platforms.console)AS Plateformes, Genre.*, Platforms.* FROM Games JOIN game_genre ON Games.Id_Games = game_genre.Id_Games JOIN Genre ON Genre.Id_Genre = game_genre.Id_Genre JOIN game_platform ON Games.Id_Games = game_platform.Id_Games JOIN Platforms ON Platforms.Id_Platforms = game_platform.Id_Platforms WHERE Games.Id_Games= :id GROUP BY Games.Id_Games ");
        $query->execute(["id" => $id]);
        $result =
            $query->fetch();

        if ($result) {

            $game =
                new Game($result["Id_Games"],
                    $result["title"],
                    $result["resume"],
                    $result["released"],
                    $result["editor"],
                    $result["studio"],
                    new Genre($result["Id_Genre"],
                        $result["name"],
                        new game_genre($result["Id_Games"],
                            $result["Id_Genre"])),
                    new game_genre($result["Id_Games"],
                        $result["Id_Genre"]),
                    new Platform($result["Id_Genre"],
                        $result["console"],
                        new game_platform($result["Id_Games"],
                            $result["Id_Platforms"])),
                    new game_platform($result["Id_Games"],
                        $result["Id_Platforms"]),
                    $result["Genres"],
                    $result["Plateformes"],
                    "",
                    $result["picture"]);

        }

        return $game;
    }

    public function findByDate($dateBegin,
                               $dateEnd)
    {
        $query =
            $this->bdd->prepare('SELECT COUNT(1) AS nbGames FROM Games WHERE addDate >=:dateBegin AND addDate < :dateEnd');
        $query->execute(["dateBegin" => $dateBegin,
            "dateEnd" => $dateEnd]);
        $result =
            $query->fetch(\PDO::FETCH_ASSOC);


        return $result['nbGames'];
    }

    public function findByTodayDate($dateToday,
                                    $dateLastWeek)
    {
        $query =
            $this->bdd->prepare('SELECT COUNT(1) AS nbGames FROM `Games` WHERE addDate >= :dateLastWeek AND addDate <= :dateToday;');
        $query->execute(["dateToday" => $dateToday,
            "dateLastWeek" => $dateLastWeek]);
        $result =
            $query->fetch(\PDO::FETCH_ASSOC);


        return $result['nbGames'];
    }

    public function search($searchResult)
    {

        $query =
            $this->bdd->prepare('SELECT * FROM Games WHERE title LIKE :searchResult;');
        $query->execute(["searchResult" => '%' .
            $searchResult .
            '%']);
        $result =
            $query->fetchAll();

        return $result;
    }

    public function countGames()
    {

        $query =
            $this->bdd->prepare('SELECT COUNT(1)AS TotalGames FROM Games;');
        $query->execute();
        $nbGames =
            $query->fetch(\PDO::FETCH_ASSOC);
        return $nbGames['TotalGames'];

    }

    public function add(Game $game)
    {

        $query =
            $this->bdd->prepare('INSERT INTO Games (title,resume,released,editor,studio, addDate, picture) VALUES (:title,:resume,:released,:editor, :studio, :addDate, :picture);');
        $query->execute([
            "title" => $game->getTitle(),
            "resume" => $game->getResume(),
            "released" => $game->getReleased(),
            "editor" => $game->getEditor(),
            "studio" => $game->getStudio(),
            "addDate" => $game->getAddDate(),
            "picture" => $game->getPicture()
        ]);
    }


    public function delete($game)
    {

        $query =
            $this->bdd->prepare('DELETE FROM Games WHERE Id_Games= :id');
        $query->execute([
            "id" => $game->getId()
        ]);
    }


}