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
    <form action="res.php"  method="POST" id="my_form" action="javascript:void(null);" enctype="multipart/form-data">
        <legend>Test From</legend>
        <label for="name">Name:</label><input id="name" name="name" value="" type="text">
        <label for="email">Email:</label><input id="email" name="email" value="" type="text">
        <input type="file" name="file" id="file"><br>
        <input type="file" name="file2" id="file2"><br>
        <input value="Send" type="submit" onclick="">
    </form>
    <div id="results">вывод</div>

</body>
<script src="js/script.js"></script>
</html>

<?php
