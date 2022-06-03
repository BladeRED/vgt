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

            $reviewsList[] = new Review($result["Id_Reviews"], $result["note"], $result["comment"], $result["comment_date"], $result["isSignaled"], new Gamer($result["Id_Gamer"], $result["pseudo"], $result["password"], $result["mail"], $result["role"], $result["picture"], $result["registerDate"]));

        }
        return $reviewsList;
    }

    public function findByDate($dateBegin,$dateEnd)
    {
        $query = $this->bdd->prepare('SELECT COUNT(*) AS nbReviews FROM Reviews WHERE comment_date >=:dateBegin AND comment_date < :dateEnd');
        $query->execute(["dateBegin" => $dateBegin,
            "dateEnd" => $dateEnd]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        return $result['nbReviews'];
    }

    public function getOneByReviewId($id)
    {
        $review = null;
        $query = $this->bdd->prepare('SELECT * FROM Reviews WHERE Id_Reviews =:Id_Reviews');
        $query->execute(["Id_Reviews" => $id]);
        $result = $query->fetch();

        if ($result) {

            $review = new Review($result["Id_Reviews"], $result["note"], $result["comment"], $result["comment_date"], $result["isSignaled"],$result["Id_Gamer"]);

        }

        return $review;
    }

    public function countReviews(){

        $query = $this->bdd->prepare('SELECT COUNT(*)AS TotalReviews FROM Games;');
        $query->execute();
        $nbGames = $query->fetch(\PDO::FETCH_ASSOC);
        return $nbGames['TotalReviews'];

    }

    public function delete($review)
    {

        $query = $this->bdd->prepare('DELETE FROM Reviews WHERE Id_Reviews= :id');
        $query->execute([
            "id" => $review->getId()
        ]);
    }
}