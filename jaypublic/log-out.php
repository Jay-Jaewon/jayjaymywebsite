<?php
session_start();

//로그아웃

setcookie("userIDCookie","",time()-24*3600,"/");
setcookie("userPWCookie","",time()-24*3600,"/");

session_destroy();
?>
<script>
    location.href='../index.php';
    alert("로그아웃 하셨습니다.");
</script>
