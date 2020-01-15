<?php
require_once '../autoload.php';
function add_article(){
   $sth = \lib\DataBase::execute("INSERT INTO `vacancy`.`article` (`title`, `text`,`date_created`, `status`) VALUES (:title, :text, UNIX_TIMESTAMP(), :status);",
       $arr = [
           ':title' => '123456',
           ':text' => 'text',
           ':status' => 1
       ]);
}
lib\DataBase::init();
/*$sth = \lib\DataBase::execute("INSERT INTO `vacancy`.`article` (`title`, `text`,`date_created`, `status`) VALUES (:title, :text, UNIX_TIMESTAMP(), :status);",
    $arr = [
        ':title' => $_POST['article'],
        ':text' => $_POST['textArticle'],
        ':status' => 1
    ]);*/
$article = $_POST['article'];
$textArticle = $_POST['textArticle'];
$lastInsertId = \lib\DataBase::lastInsertId();
$fileName = $_FILES[0]['name'];
$puth = "uploads/.$fileName";
$sth = \lib\DataBase::execute("INSERT INTO `vacancy`.`article` (`title`, `text`,`date_created`, `status`) VALUES ('$article', '$textArticle', UNIX_TIMESTAMP(), 1);");
$sth = \lib\DataBase::execute("INSERT INTO `vacancy`.`img` (`title`, `id_article`,`puth`,`date_created`, `status`) VALUES (
    '$fileName', 
    '$lastInsertId', 
    '$puth',
     UNIX_TIMESTAMP(), 1);");
echo "Данные успешно сохренены";
print_r($_POST);
print_r($_FILES["file2"]["name"]);
