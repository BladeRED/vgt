<?php

namespace app\Models;

class Game{

    private $id;
    private $title;
    private $resume;

    // For join genre and platform tables //
    private $genre;
    private $game_genre;
    private $platform;
    private $game_platform;

    /**
     * @param $id
     * @param $title
     * @param $resume
     * @param $genre
     * @param $game_genre
     * @param $platform
     * @param $game_platform
     */
    public function __construct($id, $title, $resume, $genre, $game_genre, $platform, $game_platform)
    {
        $this->id = $id;
        $this->title = $title;
        $this->resume = $resume;
        $this->genre = $genre;
        $this->game_genre= $game_genre;
        $this->platform= $platform;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param mixed $resume
     */
    public function setResume($resume): void
    {
        $this->resume = $resume;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre): void
    {
        $this->genre = $genre;
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
        $this->game_genre = $game_genre;
    }

    /**
     * @return mixed
     */
    public function getplatform()
    {
        return $this->platform;
    }

    /**
     * @param mixed $platform
     */
    public function setplatform($platform): void
    {
        $this->platform = $platform;
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
        $this->game_platform = $game_platform;
    }


}