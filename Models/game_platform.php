<?php

namespace app\Models;

class game_platform
{

    private $id_game;
    private $id_platform;


    /**
     * @param $id_game
     * @param $id_platform
     */
    public function __construct($id_game,
                                $id_platform)
    {
        $this->id_game =
            $id_game;
        $this->id_platform =
            $id_platform;

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
    public function getIdPlatform()
    {
        return $this->id_platform;
    }

    /**
     * @param mixed $id_platform
     */
    public function setIdPlatform($id_platform): void
    {
        $this->id_platform =
            $id_platform;
    }


}