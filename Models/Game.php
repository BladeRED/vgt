<?php

namespace app\Models;

class Game{

    private $id;
    private $title;
    private $resume;

    /**
     * @param $id
     * @param $title
     * @param $resume
     */
    public function __construct($id, $title, $resume)
    {
        $this->id = $id;
        $this->title = $title;
        $this->resume = $resume;
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


}