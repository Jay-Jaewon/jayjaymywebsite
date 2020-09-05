<?php
    session_start();
if (!isset($_SESSION['userID'])) {
    $userLogin = false;
} else {
    $userLogin = true;
}
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel= "stylesheet"  href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <title>Jay shop</title>
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        function quit_login() {
            alert("로그인이 취소 되었습니다.");
            history.back();
        }
    </script>
</head>
<body>
    <?php include 'menu.php' ?>
<form action="login-request.php" method="post" style="text-align: center">
    <fieldset style="text-align: center;width: 600px; margin: auto;margin-top:120px;">
        <legend style="font-size: 30px; font-weight: normal;">로그인</legend>
        <p>
            <label for="usr_ID">ID :</label>
            <input id="usr_ID" type="text" name="userID" />
        </p>
        <p>
            <label for="usr_PW">PW :</label>
            <input id="usr_PW" type="password" name="userPW">
        </p>
    </fieldset>
    <p>
        <input type="submit" value="로그인"style="border-radius: 5px; background-color: antiquewhite;"/>
        <input type="reset" value="취소" onclick="quit_login()" style="border-radius: 5px; background-color: antiquewhite;">
    </p>
</form>
    <div style="height: 350px;">

    </div>
<?php include "bottom.php";?>
</body>
</html>