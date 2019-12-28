<<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <form method="POST" id="formx" action="javascript:void(null);" onsubmit="call()" enctype='multipart/form-data'>

        <label for="title">Наименование статьи</label><input id="title" name="title" value="" type="text">
        <label for="text">Техт статьи</label>
        <textarea name="text" id="text" cols="30" rows="10" placeholder="ведите текст статьи"></textarea>
        <input type='file' name='filename' size='10'>
        <input value="Сохранить" type="submit">
    </form>
    <div id="results">вывод</div>

</body>
<script src="js/script.js"></script>
</html>

<?php
