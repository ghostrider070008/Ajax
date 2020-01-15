<?php
namespace lib;
//namespace php\Connect;

use \PDO;
use \PDOException;

class DataBase // Класс соединения с БД
{
    private static $host = '127.0.0.1';
    private static $user = 'root';
    private static $pass = '';
    private static $dbName = 'vacancy';
    private static $db;

    /*function __construct($host, $user, $pass, $dbName)
    {
        self::$host = $host;
        self::$user = $user;
        self::$pass = $pass;
        self::$dbName = $dbName;
    }*/
// Функция инилициялизации БД
    public static function init() {
        try {
            self::$db = new PDO(
                "mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8",
                self::$user, self::$pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8')
            );
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //print_r(self::$db);
            //self::$db->exec("SET NAMES utf8"); -- не нужно если сработает PDO::MYSQL_ATTR_INIT_COMMAND?
        }
        catch (PDOException $e)
        {
            die('<h3 style="color: blue">Ошибка соединения с БД. Повторите попытку через полминуты</h3>');
        }
    }
// Функция запроса
    public static function query($sql) {
        return self::$db->query($sql);
    }
    // Получение всех записей
    public static function fetchAll($sql, $ar = []) {
        if ($ar === []) {

            $sth = self::$db->prepare($sql);
            $sth->execute();
            return $sth->fetchAll();
        }
        else{
            $sth = self::$db->prepare($sql);
            $sth->execute($ar);
            return $sth->fetchAll();
        }
    }

    public function fetch($query, $params = []) {
        // подготавливаем запрос к выполнению
        $sth = self::$db->prepare($query);
        // выполняем запрос
        $sth->execute($params);
        // получаем результат
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        // возвращаем результат запроса
        return $result;
    }

    public function fetchOne($query, $params = array()) {
        // подготавливаем запрос к выполнению
        $sth = self::$db->prepare($query);
        // выполняем запрос
        $sth->execute($params);
        // получаем результат
        $result = $sth->fetch(PDO::FETCH_NUM);
        // возвращаем результат запроса
        if (false === $result) {
            return false;
        }
        return $result[0];
    }

    public function beginTransaction() {
        return self::$db->beginTransaction();
    }

    public function commit() {
        return self::$db->commit();
    }

    public function rollBack() {
        return self::$db->rollBack();
    }
// выполнение запроса, не требующего возврата результата
    static public function exec($sql) {
        return self::$db->exec($sql);
    }

    // Выбор только одного значения из БД, соотв. запросу.
    static public function column($sql) {
        return self::$db->query($sql)->fetchColumn();
    }

    // тоже самое, только возвращается intval значение поля выборки
    static public function columnInt($sql) {
        return intval(self::$db->query($sql)->fetchColumn());
    }

    //подготовка запроса, возвращает PDOStatement.
    static public function prepare($sql) {
        return self::$db->prepare($sql);
    }

    // получение lastInsertId от последнего запроса INSERT
    static public function lastInsertId() {
        return self::$db->lastInsertId();
    }

    // подготавливает и сразу выполняет запрос
    static public function execute($sql, $ar = [])
    {
        if ($ar === []) {

            return self::$db->prepare($sql)->execute();
        }
        else{
            return self::$db->prepare($sql)->execute($ar);
        }
    }

    // возвращает строку последней ошибки над DB вместе с кодами в скобках
    static public function error() {
        $ar = self::$db->errorInfo();
        return $ar[2] . ' (' . $ar[1] . '/' . $ar[0] . ')';
    }

    // returns one row fetched in FETCH_ASSOC mode
    static public function fetchAssoc($sql) {
        return self::$db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    //
    static public function fetchNum($sql) {
        return self::$db->query($sql)->fetch(PDO::FETCH_NUM);
    }
    public static function insert(){
        $sql = "INSERT INTO `vacancy`.`current_migrations` (`name`, `date`, `status`) VALUES ('1', '1', '1');";
    }

//Функция соединения с БД
}