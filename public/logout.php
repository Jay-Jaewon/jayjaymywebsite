<?php
session_start();

if (!isset($_SESSION['userID'])) {
    $userLogin = false;
} else {
    $userLogin = true;
}

if ($userLogin){
    session_destroy();
    echo '<script>alert("로그아웃 하셨습니다.");</script>';
} else{
    echo '<script>alert("로그인 상태가 아닙니다.");</script>';
}
echo '<script>location.replace("../index.php")</script>';

?>