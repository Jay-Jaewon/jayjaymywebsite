<?php
session_start();
//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
if ($userLogin){
    //정상 로그인
}else{
    //비 정상적인 접근
    echo "<script>alert('비정상적인 접근 입니다.'); location.replace('/index.php'); </script>";
}
$input = $_POST['userPW'];
$PW = $_SESSION['userPW'];
if ($input == $PW){
    //일차하는 경우
    $_SESSION['state'] = "userInfo";
    echo '<script>location.replace("userInfo.php"); </script>';
}else {
    //일치하지 않는 경우
    echo '<script>alert("비밀번호가 일치하지 않습니다."); location.replace("pw-check.php"); </script>';
}

?>