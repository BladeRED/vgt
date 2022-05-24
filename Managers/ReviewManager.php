<?php

namespace app\Managers;
use app\Models\Gamer;
use app\Models\Review;

class ReviewManager extends DBManager{

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Reviews JOIN Gamer ON Reviews.Id_Gamer=Gamer.Id_Gamer');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $reviewsList[] = new Review($result["Id_Reviews"], $result["note"], $result["comment"], $result["comment_date"], $result["isSignaled"], new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"], $result["picture"]));

        }
        return $reviewsList;
    }


}