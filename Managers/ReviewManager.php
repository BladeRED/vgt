<?php

namespace app\Managers;
use app\Models\Review;

class ReviewManager extends DBManager{

    public function findAll()
    {

        $query = $this->bdd->prepare('SELECT * FROM Reviews');
        $query->execute();
        $results = $query->fetchAll();


        foreach ($results as $result) {

            $reviewsList[] = new Review($result["Id_Reviews"], $result["note"], $result["comment"], $result["comment_date"], $result["isSignaled"]);

        }
        return $reviewsList;
    }


}