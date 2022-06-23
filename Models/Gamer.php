<?php

namespace app\Models;

class Gamer
{

    private $id;
    private $pseudo;
    private $password;
    private $mail;
    private $role;
    private $picture;
    private $registerdate;

    /**
     * @param $id
     * @param $pseudo
     * @param $password
     * @param $mail
     * @param $role
     * @param $picture
     * @param $registerdate ;
     */
    public function __construct($id,
                                $pseudo,
                                $password,
                                $mail,
                                $role,
                                $picture,
                                $registerdate)
    {
        $this->id =
            $id;
        $this->pseudo =
            $pseudo;
        $this->password =
            $password;
        $this->mail =
            $mail;
        $this->role =
            $role;
        $this->picture =
            $picture;
        $this->registerdate =
            $registerdate;
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
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo): void
    {
        $this->pseudo =
            $pseudo;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password =
            $password;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail =
            $mail;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role =
            $role;
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

    public function toArray()
    {

        return [
            "id" => $this->getId(),
            "pseudo" => $this->getPseudo(),
            "password" => $this->getPassword(),
            "mail" => $this->getMail(),
            "role" => $this->getRole(),
            "picture" => $this->getPicture()
        ];
    }

    /**
     * @return mixed
     */
    public function getRegisterdate()
    {
        return $this->registerdate;
    }

    /**
     * @param mixed $registerdate
     */
    public function setRegisterdate($registerdate): void
    {
        $this->registerdate =
            $registerdate;
    }


}


