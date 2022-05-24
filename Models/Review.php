<?php

namespace app\Models;

class Review {

    private $id;
    private $note;
    private $comment;
    private $date;
    private $isSignaled;

    //For join the gamers model //
    private $gamer;

    /**
     * @param $id
     * @param $note
     * @param $comment
     * @param $date
     * @param $isSignaled
     * @param $gamer
     */
    public function __construct($id, $note, $comment, $date, $isSignaled, $gamer)
    {
        $this->id = $id;
        $this->note = $note;
        $this->comment = $comment;
        $this->date = $date;
        $this->isSignaled = $isSignaled;
        $this->gamer= $gamer;
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
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note): void
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getIsSignaled()
    {
        return $this->isSignaled;
    }

    /**
     * @param mixed $isSignaled
     */
    public function setIsSignaled($isSignaled): void
    {
        $this->isSignaled = $isSignaled;
    }

    /**
     * @return mixed
     */
    public function getgamer()
    {
        return $this->gamer;
    }

    /**
     * @param mixed $gamer
     */
    public function setgamer($gamer): void
    {
        $this->gamer = $gamer;
    }




}