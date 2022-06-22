<?php

namespace app\Managers;

use app\Models\Game;
use app\Models\Gamer;
use app\Models\Time;

class TimeManager extends DBManager
{

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Gametimes JOIN Gamer ON Gametimes.Id_Gamer = Gamer.Id_Gamer JOIN Games ON Gametimes.Id_Games = Games.Id_Games;');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $timesList[] = new Time($result["Id_Gametimes"], $result["category"], $result["hours"], $result["minuts"], $result["seconds"], $result["Id_Games"], new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"], $result["picture"], $result["registerDate"]), new Game($result["Id_Games"], $result["title"], $result["resume"], $result["released"], $result["editor"], $result["studio"], '', '', '', '', ', ', '', $result["addDate"], $result["picture"]), $result["addDate"]);

        }

        return $timesList;
    }

    public function findByDate($dateBegin, $dateEnd)
    {
        $query = $this->bdd->prepare('SELECT COUNT(1) AS nbTimes FROM Gametimes WHERE addDate >=:dateBegin AND addDate < :dateEnd');
        $query->execute(["dateBegin" => $dateBegin,
            "dateEnd" => $dateEnd]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result['nbTimes'];
    }

    public function sumByDate($dateBegin, $dateEnd)
    {
        $query = $this->bdd->prepare('SELECT SUM(hours) as sumHrs,SUM(minuts) AS sumMins, SUM(seconds) AS sumScs FROM Gametimes WHERE addDate >=:dateBegin AND addDate < :dateEnd');
        $query->execute(["dateBegin" => $dateBegin,
            "dateEnd" => $dateEnd]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result;
    }

    public function findByHistDate($dateBegin, $dateEnd)
    {
        $query = $this->bdd->prepare('SELECT COUNT(1) AS nbTimes FROM Gametimes WHERE category = "Histoire" AND addDate >=:dateBegin AND addDate < :dateEnd');
        $query->execute(["dateBegin" => $dateBegin,
            "dateEnd" => $dateEnd]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result['nbTimes'];
    }

    public function findByHistCateg()
    {
        $query = $this->bdd->prepare('SELECT COUNT(1) AS Histoire FROM Gametimes WHERE category="Histoire";SELECT COUNT(*) AS Complétioniste FROM Gametimes WHERE category="Complétioniste";SELECT COUNT(*) AS Extras FROM Gametimes WHERE category = "Histoire+Extras";');
        $query->execute();
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result["Histoire"];
    }

    public function findByCompDate($dateBegin, $dateEnd)
    {
        $query = $this->bdd->prepare('SELECT COUNT(1) AS nbTimes FROM Gametimes WHERE category = "Complétioniste" AND addDate >=:dateBegin AND addDate < :dateEnd');
        $query->execute(["dateBegin" => $dateBegin,
            "dateEnd" => $dateEnd]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result['nbTimes'];
    }

    public function findByCompCateg()
    {
        $query = $this->bdd->prepare('SELECT COUNT(1) AS Complétioniste FROM Gametimes WHERE category="Complétioniste";');
        $query->execute();
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result["Complétioniste"];
    }

    public function findByExtraDate($dateBegin, $dateEnd)
    {
        $query = $this->bdd->prepare('SELECT COUNT(1) AS nbTimes FROM Gametimes WHERE category = "Histoire+Extras" AND addDate >=:dateBegin AND addDate < :dateEnd');
        $query->execute(["dateBegin" => $dateBegin,
            "dateEnd" => $dateEnd]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result['nbTimes'];
    }

    public function findByExtraCateg()
    {
        $query = $this->bdd->prepare('SELECT COUNT(1) AS Extras FROM Gametimes WHERE category = "Histoire+Extras";');
        $query->execute();
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result["Extras"];
    }

    public function getOneByTimeId($id)
    {
        $time = null;
        $query = $this->bdd->prepare('SELECT * FROM Gametimes WHERE Id_Gametimes =:Id_Gametimes');
        $query->execute(["Id_Gametimes" => $id]);
        $result = $query->fetch();

        if ($result) {

            $time = new Time($result["Id_Gametimes"], $result["category"], $result["hours"], $result["minuts"], $result["seconds"], $result["Id_Games"], $result["Id_Gamer"], $result["Id_Games"], $result["addDate"]);

        }

        return $time;
    }

    public function findTimeByGameId($id)
    {
        $time = null;
        $query = $this->bdd->prepare('SELECT * FROM Gametimes WHERE Id_Games =:Id_Games');
        $query->execute(["Id_Games" => $id]);
        $result = $query->fetch();

        if ($result) {

            $time = new Time($result["Id_Gametimes"], $result["category"], $result["hours"], $result["minuts"], $result["seconds"], $result["Id_Games"], $result["Id_Gamer"], $result["Id_Games"], $result["addDate"]);

        }

        return $time;
    }

    public function findTimeByGamerId($id)
    {

        $query = $this->bdd->prepare('SELECT COUNT(1) AS Total_Times FROM Gametimes WHERE Id_Gamer =:Id_Gamer');
        $query->execute(["Id_Gamer" => $id]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result["Total_Times"];
    }

    public function findAvgTimeByGameId($id)
    {

        $query = $this->bdd->prepare('SELECT ROUND(AVG(hours)) AS Hours ,ROUND(AVG(minuts)) AS Minuts, ROUND(AVG(seconds)) AS Seconds FROM Gametimes WHERE Id_Games =:Id_Games;');
        $query->execute(["Id_Games" => $id]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result;
    }

    public function findHistAvgTimeByGameId($id)
    {

        $query = $this->bdd->prepare('SELECT ROUND(AVG(hours)) AS Hours ,ROUND(AVG(minuts)) AS Minuts, ROUND(AVG(seconds)) AS Seconds FROM Gametimes WHERE Id_Games =:Id_Games AND category="Histoire";');
        $query->execute(["Id_Games" => $id]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result;
    }

    public function findExtraAvgTimeByGameId($id)
    {

        $query = $this->bdd->prepare('SELECT ROUND(AVG(hours)) AS Hours ,ROUND(AVG(minuts)) AS Minuts, ROUND(AVG(seconds)) AS Seconds FROM Gametimes WHERE Id_Games =:Id_Games AND category="Histoire + Extras";');
        $query->execute(["Id_Games" => $id]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result;
    }

    public function findCompAvgTimeByGameId($id)
    {

        $query = $this->bdd->prepare('SELECT ROUND(AVG(hours)) AS Hours ,ROUND(AVG(minuts)) AS Minuts, ROUND(AVG(seconds)) AS Seconds FROM Gametimes WHERE Id_Games =:Id_Games AND category="Complétioniste";');
        $query->execute(["Id_Games" => $id]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result;
    }

    public function findAvgTimeByGame()
    {

        $query = $this->bdd->prepare('SELECT ROUND(AVG(hours)) AS Hours ,ROUND(AVG(minuts)) AS Minuts, ROUND(AVG(seconds)) AS Seconds FROM Gametimes GROUP BY Id_Games;');
        $query->execute();
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }

    public function findByTodayDate($dateToday, $dateLastWeek)
    {
        $query = $this->bdd->prepare('SELECT COUNT(1) AS nbTimes FROM `Gametimes` WHERE addDate >= :dateLastWeek AND addDate <= :dateToday;');
        $query->execute(["dateToday" => $dateToday, "dateLastWeek" => $dateLastWeek]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result['nbTimes'];
    }

    public function countTimes()
    {

        $query = $this->bdd->prepare('SELECT COUNT(1)AS TotalTimes FROM Gametimes;');
        $query->execute();
        $nbTimes = $query->fetch(\PDO::FETCH_ASSOC);
        return $nbTimes['TotalTimes'];

    }

    public function sumTimes()
    {

        $query = $this->bdd->prepare('SELECT SUM(hours) AS totalhours , SUM(minuts) AS totalminuts, SUM(seconds) AS totalseconds FROM Gametimes;');
        $query->execute();
        $dataTimes = $query->fetch(\PDO::FETCH_ASSOC);


        return $dataTimes;

    }

    public function delete($time)
    {

        $query = $this->bdd->prepare('DELETE FROM Gametimes WHERE Id_Gametimes= :id');
        $query->execute([
            "id" => $time->getId()
        ]);
    }

    public function add(Time $time)
    {

        $query = $this->bdd->prepare("INSERT INTO Gametimes(category,hours,minuts,seconds,Id_Games,Id_Gamer,addDate) VALUES (:category, :hours, :minuts, :seconds, :Id_Games, :Id_Gamer, :addDate)");
        $query->execute([
            "category" => $time->getCategory(),
            "hours" => $time->getHours(),
            "minuts" => $time->getMinuts(),
            "seconds" => $time->getSeconds(),
            "Id_Games" => $time->getId_Games(),
            "Id_Gamer" => $time->getgamer(),
            "addDate" => $time->getAddDate(),
        ]);


    }

    public function deleteByGame($game)
    {

        $query = $this->bdd->prepare('DELETE FROM Gametimes WHERE Id_Games= :id');
        $query->execute([
            "id" => $game->getId()
        ]);
    }

}