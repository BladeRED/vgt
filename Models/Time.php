<?php

namespace app\Models;

class Time {

    private $id;
    private $category;
    private $hours;
    private $minuts;
    private $seconds;
    private $Id_Games;

    /**
     * @param $id
     * @param $category
     * @param $hours
     * @param $minuts
     * @param $seconds
     * @param $Id_Games
     */
    public function __construct($id, $category, $hours, $minuts, $seconds, $Id_Games)
    {
        $this->id = $id;
        $this->category = $category;
        $this->hours = $hours;
        $this->minuts = $minuts;
        $this->seconds = $seconds;
        $this->Id_Games= $Id_Games;
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
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param mixed $hours
     */
    public function setHours($hours): void
    {
        $this->hours = $hours;
    }

    /**
     * @return mixed
     */
    public function getMinuts()
    {
        return $this->minuts;
    }

    /**
     * @param mixed $minuts
     */
    public function setMinuts($minuts): void
    {
        $this->minuts = $minuts;
    }

    /**
     * @return mixed
     */
    public function getSeconds()
    {
        return $this->seconds;
    }

    /**
     * @param mixed $seconds
     */
    public function setSeconds($seconds): void
    {
        $this->seconds = $seconds;
    }

    /**
     * @return mixed
     */
    public function getId_Games()
    {
        return $this->Id_Games;
    }

    /**
     * @param mixed $seconds
     */
    public function setId_Games($Id_Games): void
    {
        $this->Id_Games = $Id_Games;
    }


}