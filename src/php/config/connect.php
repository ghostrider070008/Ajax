<?php
include_once('config.php');
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try{
    $pdo = new PDO($dsn, $user, $pass, $opt);
}
catch (PDOException $e) {
    echo 'Соединение оборвалось: ' . $e->getMessage();
    exit;
}


