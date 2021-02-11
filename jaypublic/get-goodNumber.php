<?php
$boardType = $_REQUEST['boardType'];
$boardNumber = $_REQUEST['boardNumber'];

$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);

//게시판 타입과 번호를 가지고 해당글의 추천개수를 구해야한다.
$sql = "select good from $boardType where number = $boardNumber";

$result = $mysqli->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);
$goodNum = $row['good'];
echo $goodNum;

?>