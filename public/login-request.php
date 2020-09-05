<?php
session_start();

$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);

$userID = htmlspecialchars($_POST['userID'],ENT_QUOTES, 'UTF-8');
$userPW = htmlspecialchars($_POST['userPW'],ENT_QUOTES, 'UTF-8');

$sql = "select * from userInfo where id = '$userID' and password = '$userPW'";
$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

if($row != null){
    $_SESSION['userID'] = $row['id'];
    $_SESSION['userPW'] = $row['password'];
    $_SESSION['userName'] = $row['name'];
    $_SESSION['userNickName'] = $row['NickName'];
    echo '<script>alert("로그인 성공");</script>';
    echo '<script>location.replace("../index.php"); </script>';

}
if($row == null){
    echo '<script>alert("로그인 실패 아이디 비밀번호를 확인해 주세요.") </script>';
    echo '<script>history.back();</script>';

}

mysqli_close($mysqli);




//if($userID == "1234" && $userPW == "1234"){
//    echo '<p style="text-align: center;font-weight: bold; font-size: 30px;margin-top: 20px;">
//로그인 성공</p>';
//}else{
//    echo '<p style="text-align: center;font-weight: bold; font-size: 30px;margin-top: 20px;">
//로그인 실패</p>';
//
//}

?>
