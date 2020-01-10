<?php

class Migration
{
    public $per = 0;
    /**
     * Хост базы данных
     */
    public $host;
    /**
     * Имя базы данных
     */
    public $name;
    /**
     * Пользователь базы данных
     */
    public $user;
    /**
     * Пароль базы данных
     */
    public $pass;

    /**
     * Имя таблицы БД для учета миграций
     */
    public $stateTable;

    /**
     * Для хранения экземпляра класса для работы с базой данных
     */
    public $database;

    function __construct($host, $user, $pass)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;



    }

    function init(){
        $this->database = new PDO('Mysql:host='.$this->host, $this->user, $this->pass);
    }
}