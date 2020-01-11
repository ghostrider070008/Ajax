<?php
require "../config.php";

spl_autoload_register( function($classname){
   require_once("../../lib/".$classname .".php");
    return print_r($classname);
} );
$migration = true;


$connect = new ConnectTable($host, $user, $pass);
$db = new PDO("mysql:host=$connect->host", $connect->user, $connect->pass);
$dbs = $db->query("SHOW DATABASES");
while( ( $dbd = $dbs->fetchColumn( 0 ) ) !== false )
{
    if ($dbd == 'vacancy'){
        $migration = false;
        print_r($dbs);
    }
    //echo $dbd.'<br>';
}
if($migration == true) {
    $dbs = $db->prepare("CREATE DATABASE IF NOT EXISTS vacancy");
    $dbs->execute();
}


