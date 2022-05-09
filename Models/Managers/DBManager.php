<?php

abstract class DBManager
{
    protected $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:dbname=database;host=mariadb;charset=utf8", "user", "zeus");
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}

?>