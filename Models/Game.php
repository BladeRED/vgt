<?php

namespace app\Models;

class Game
{

    private $id;
    private $title;
    private $resume;
    private $released;
    private $editor;
    private $studio;


    // For join genre and platform tables //
    private $genre;
    private $game_genre;
    private $platform;
    private $game_platform;

    // Concatenation of genres and platforms //

    private $genres;
    private $platforms;

    //For the pictures //

    private $picture;


    /**
     * @param $id
     * @param $title
     * @param $resume
     * @param $released
     * @param $editor
     * @param $studio
     * @param $addDate
     * @param $genre
     * @param $game_genre
     * @param $platform
     * @param $game_platform
     * @param $genres
     * @param $platforms
     * @param $picture
     */
    public function __construct($id,
                                $title,
                                $resume,
                                $released,
                                $editor,
                                $studio,
                                $genre,
                                $game_genre,
                                $platform,
                                $game_platform,
                                $genres,
                                $platforms,
                                $addDate,
                                $picture)
    {
        $this->id =
            $id;
        $this->title =
            $title;
        $this->resume =
            $resume;
        $this->released =
            $released;
        $this->editor =
            $editor;
        $this->studio =
            $studio;
        $this->genre =
            $genre;
        $this->game_genre =
            $game_genre;
        $this->platform =
            $platform;
        $this->game_platform =
            $game_platform;
        $this->genres =
            $genres;
        $this->platforms =
            $platforms;
        $this->addDate =
            $addDate;
        $this->picture =
            $picture;
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
        $this->id =
            $id;
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
        $this->title =
            $title;
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
        $this->resume =
            $resume;
    }

    /**
     * @return mixed
     */
    public function getReleased()
    {
        return $this->released;
    }

    /**
     * @param mixed $released
     */
    public function setReleased($released): void
    {
        $this->released =
            $released;
    }

    /**
     * @return mixed
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * @param mixed $editor
     */
    public function setEditor($editor): void
    {
        $this->editor =
            $editor;
    }

    /**
     * @return mixed
     */
    public function getStudio()
    {
        return $this->studio;
    }

    /**
     * @param mixed $studio
     */
    public function setStudio($studio): void
    {
        $this->studio =
            $studio;
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
        $this->genre =
            $genre;
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
        $this->game_genre =
            $game_genre;
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
        $this->platform =
            $platform;
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
        $this->game_platform =
            $game_platform;
    }

    /**
     * @return mixed
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param mixed $genres
     */
    public function setGenres($genres): void
    {
        $this->genres =
            $genres;
    }

    /**
     * @return mixed
     */
    public function getPlatforms()
    {
        return $this->platforms;
    }

    /**
     * @param mixed $platforms
     */
    public function setPlatforms($platforms): void
    {
        $this->platforms =
            $platforms;
    }

    /**
     * @return mixed
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * @param mixed $addDate
     */
    public function setAddDate($addDate): void
    {
        $this->addDate =
            $addDate;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture): void
    {
        $this->picture =
            $picture;
    }


}