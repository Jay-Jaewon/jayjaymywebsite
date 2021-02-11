<?php
session_start();
$userID = $_SESSION['userID'];
$commentNumber = $_REQUEST['number'];

$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);

$sql = "select * from comment where number = $commentNumber";
$result = $mysqli->query($sql);
$row = $result->fetch_array();
if($row['userID'] == $userID){
    $sql = "delete from comment where number = $commentNumber";
    $result = $mysqli->query($sql);
    if($result){
        //echo "00";
    }else{
        //echo "000";
    }
}else{
    //echo "001";
}
echo '<script>location.replace(history.back());</script>';
?>