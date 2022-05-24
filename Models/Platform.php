<?php

namespace app\Models;

class Platform {

    private $id;
    private $console;

    // For joining the game table //
    private $game_platform;

    /**
     * @param $id
     * @param $console
     * @param $game_platform
     */
    public function __construct($id, $console,$game_platform)
    {
        $this->id = $id;
        $this->console = $console;
        $this->game_platform= $game_platform;
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
    public function getConsole()
    {
        return $this->console;
    }

    /**
     * @param mixed $console
     */
    public function setConsole($console): void
    {
        $this->console = $console;
    }

    /**
     * @return mixed
     */
    public function getgame_platform()
    {
        return $this->game_platform;
    }

    /**
     * @param mixed $game_platform
     */
    public function setgame_platform($game_platform): void
    {
        $this->game = $game_platform;
    }




}