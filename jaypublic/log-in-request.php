<?php
session_start();

$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);

$userID = htmlspecialchars($_POST['userID'],ENT_QUOTES, 'UTF-8');
$userPW = htmlspecialchars($_POST['userPW'],ENT_QUOTES, 'UTF-8');

$sql = "select * from jayUserInfo where id = '$userID' and password = '$userPW'";
$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

if($row != null){
    $_SESSION['userID'] = $row['id'];
    $_SESSION['userPW'] = $row['password'];
    $_SESSION['userNickName'] = $row['nickname'];
    $_SESSION['userEmail'] = $row['email'];
    //echo '<script>alert("로그인 성공");</script>';
    if (isset($_POST['autoLogin'])){
        //자동로그인
        setcookie("userIDCookie","$_SESSION[userID]",time()+3600*24,"/");
        $hashPW = hash("sha256","$row[password]");
        //sha256방식으로 단방향 암호화함.
        setcookie("userPWCookie","$hashPW",time()+3600*24,"/");
    }
    echo '<script>location.replace("../index.php"); </script>';

}
if($row == null){
    echo '<script>alert("아이디 또는 비밀번호가 일치하지 않습니다.") </script>';
    echo '<script>history.back();</script>';

}

mysqli_close($mysqli);
?>