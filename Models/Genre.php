<?php

namespace app\Models;

class Genre {

    private $id;
    private $name;

    // For joining the game table //
    private $game_genre;

    /**
     * @param $id
     * @param $name
     * @param $game_genre
     */
    public function __construct($id, $name,$game_genre)
    {
        $this->id = $id;
        $this->name = $name;
        $this->game_genre= $game_genre;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getgame_genre()
    {
        return $this->game_genre;
    }

    /**
     * @param mixed $game_genre
     */
    public function setgame_genre($game_genre): void
    {
        $this->game = $game_genre;
    }




}