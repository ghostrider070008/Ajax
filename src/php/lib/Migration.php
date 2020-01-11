<?php
namespace lib;

use \PDO;

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
     * @var PDO
     */

    public $pdo;
    /**
     * Для хранения экземпляра класса для работы с базой данных
     */
    public $database;

    function __construct($host, $user, $pass)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;

        $this->pdo = new PDO("mysql:host=$host",$user,$pass);



    }

    public function execute(){
        $show1 = $this->pdo->query('SHOW DATABASES');
        foreach ($show1 as $key => $value) {
            //echo '<table>';
            if ($value['Database'] === 'vacancy'){
                print_r($value);
                echo "УРА!!!";
            }

        }
    }
}