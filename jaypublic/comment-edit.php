<?php
session_start();
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';

$content = $_POST['content'];
$number = $_POST['commentNumber'];
$mysqli = new mysqli($host,$user,$password,$database);
$sql = "update comment set content = '$content' where number = $number";
$mysqli->query($sql);


echo '<script>location.replace(history.back());</script>';
?>

