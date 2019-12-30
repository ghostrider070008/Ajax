<?php
$file[] = $_POST;
$file[] = $_FILES;
echo json_encode($file);
exit;

