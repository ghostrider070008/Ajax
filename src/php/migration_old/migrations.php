<?php

include('config.php');
include('ConnectTable.php');

$connect = new ConnectTable($host, $user, $pass, $db_name);

print_r($connect);
var_dump($connect->connect());


