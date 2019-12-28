<!doctype html>
<html lang="ru-RU">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <body>
        <div class="container">

            <form action="res.php" method="post" id="my_form" enctype="multipart/form-data">
                <div class="row"

                    <label for="title">Наименование статьи:</label>

                    <input type="text" name="title" id="title">
                <div class="row">

                    <label for="text">Текст статьи:</label>
                    <textarea name="text" id="text"></textarea>
                </div>
                <div class="row">
                    <label for="img">Изображение:</label>
                    <input type="file" name="img" id="img">
                </div>
                <input type="submit" id="submit" value="Сохранить">

            </form>
            <div class="message"></div>
        </div>
    </body>
<script src="js/script.js"></script>
</html>

<?php
