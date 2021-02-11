<?php
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);

//$sql = "select * from jayUserInfo";
$result = $mysqli->query($sql);

while($row = $result->fetch_array()){
    echo $row['id'].'<br>';
}
$mysqli->close();
?>