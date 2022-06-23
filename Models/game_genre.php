<?php

namespace app\Models;

class game_genre
{

    private $id_game;
    private $id_genre;


    /**
     * @param $id_game
     * @param $id_genre
     */
    public function __construct($id_game,
                                $id_genre)
    {
        $this->id_game =
            $id_game;
        $this->id_genre =
            $id_genre;

    }

    /**
     * @return mixed
     */
    public function getIdGame()
    {
        return $this->id_game;
    }

    /**
     * @param mixed $id_game
     */
    public function setIdGame($id_game): void
    {
        $this->id_game =
            $id_game;
    }

    /**
     * @return mixed
     */
    public function getIdGenre()
    {
        return $this->id_genre;
    }

    /**
     * @param mixed $id_genre
     */
    public function setIdGenre($id_genre): void
    {
        $this->id_genre =
            $id_genre;
    }


}