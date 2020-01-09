<?php
include_once('src/php/config/connect.php');
print_r($_POST);
print_r($_FILES);
$article = strip_tags($_POST['article']);
$text = strip_tags($_POST['textArticle']);
$preparedStatement = $pdo->prepare('INSERT INTO article (`title`,`text`) VALUES (:title, :text)');
$preparedStatement->execute(array('title' => $article, 'text' => $text));
echo $article;
exit;


