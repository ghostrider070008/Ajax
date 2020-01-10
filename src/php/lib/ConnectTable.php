<?php

//namespace php\Connect;


class ConnectTable // Класс соединения с БД
{
    public $host;
    public $user;
    public $pass;
    public $dbName = "vacancy";
    public $db;

    function __construct($host, $user, $pass)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
    }
//Функция соединения с БД
}