<?php

namespace app\Models;

class Review {

    private $id;
    private $note;
    private $comment;
    private $date;
    private $isSignaled;

    /**
     * @param $id
     * @param $note
     * @param $comment
     * @param $date
     * @param $isSignaled
     */
    public function __construct($id, $note, $comment, $date, $isSignaled)
    {
        $this->id = $id;
        $this->note = $note;
        $this->comment = $comment;
        $this->date = $date;
        $this->isSignaled = $isSignaled;
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




}