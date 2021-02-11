<?php
session_start();
if (($_SESSION['state']) == "userInfo"){
    //ok
    //unset($_SESSION['state']);
    //보안상 이런것들이 필요한 것 같다.
}else{
    //비정상적인 접근
    echo '<script>alert("비정상적인 접근 입니다."); location.replace("/index.php");</script>';
    exit;
}
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$conn = mysqli_connect($host,$user,$password,$database);

if (!$conn){
    $error = mysqli_connect_error();
    $errno = mysqli_connect_errno();
    print "errno: $error\n";
    exit();
}else{
    //connect success
}

$id = $_SESSION['userID'];
$query = "delete from jayUserInfo where id = '$id'";
$result = mysqli_query($conn,$query);
if($result){
    //query success
    session_destroy();
    unset($_COOKIE['userIDCookie']);
    echo '<script>alert("탈퇴되셨습니다."); location.replace("/index.php")</script>';


}else{
    //query fail
    echo "Error : ".mysqli_error($conn);
}
mysqli_close($conn);
mysqli_free_result($result);
?>