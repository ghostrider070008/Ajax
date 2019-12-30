<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="js/bootstrap/bootstrap.css">
    <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>
</head>
<body>
    <div class="container">
    <form action="res2.php"  method="POST" id="my_form" action="javascript:void(null);" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-3">
                <label for="article">Наименование статьи:</label>
            </div>
            <div class="col-sm-9">
                <input id="article" name="article" value="" type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label for="textArticle">Текст статьи:</label>
            </div>
            <div class="col-sm-9">
                <textarea id="textArticle" name="textArticle" value=""></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label for="img">Изображение:</label>
            </div>
            <div class="col-sm-3">
                <input type="file" name="file2" id="img">
            </div>
        </div>
        <input class="btn-outline-success" value="Сохранить" type="submit">
    </form>
    <div id="results">вывод</div>
    </div>
</body>
<script src="js/script.js"></script>
</html>

<?php
