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

    /**
     * Для хранения списка файлов миграций
     */

    public $files_migrations;

    function __construct($host, $user, $pass)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->name = "vacancy";

        $this->pdo = new PDO("mysql:host=$host",$user,$pass);



    }
    // Функция проверки на существование БД `vacancy`

    public function db_existance(){
        $sth = $this->pdo->prepare("SHOW DATABASES");
        $sth->execute();
        /* Извлечение всех оставшихся строк результирующего набора */
        print("Извлечение всех оставшихся строк результирующего набора:\n");
        $result = $sth->fetchAll();
        //print_r($result);
        foreach ($result as $key => $value) {
            //echo '<table>';
            if ($value['Database'] === 'vacancy') {
                print_r($value);
                echo "УРА!!!";
            }
        }

    }
//Функция проверки БД на пустые таблицы
    public function isEmpty() {
        $sth = $this->pdo->prepare("SHOW TABLES FROM `vacancy`");
        $sth->execute();
        print_r($sth->fetchAll());
        if ($sth->fetchAll() == []){
            echo "Таблиц нет";
        }
        //print_r($sth->fetchAll());
        return $sth->fetchAll();
    }
    public function prepare($query){
        $sth = $this->pdo->prepare($query);
        $sth->execute();
        echo PHP_EOL."Строка prepare";
        print_r($sth->fetchAll());
    }
// Функция получения списка файлов миграций
    public function find_migration_files(){
        return array_diff(scandir(__DIR__."/migration"),['..', '.']);
    }
// Функция поиска нужного файла миграции
    public function comparison_migration(){
        return array_search('CreateTableMigration.php', $this->find_migration_files());
    }

// Функция подключения миграции
    public function connection_migration(){
        $this->files_migrations = $this->find_migration_files();
        /*foreach ($this->files_migrations as $value){
            require 'migration/CreateTableMigration.php';
            echo "connect_migration = ".$value;
        }*/
        echo "123";
        /*spl_autoload_register( function($classname){
            include("lib/migration/".$classname .".php");
        } );*/
    }


}