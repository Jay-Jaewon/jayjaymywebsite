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
if (($_SESSION['state']) == "userInfo"){
    //ok
    //unset($_SESSION['state']);
    //보안상 이런것들이 필요한 것 같다.
}else{
    //비정상적인 접근
    echo '<script>alert("비정상적인 접근 입니다."); location.replace("/index.php");</script>';
    exit;
}
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <link rel= "stylesheet"  href="/style.css">-->
    <!--    구글폰트-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <!--  메인 이미지 파일 -->
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
    <style>
        /*기본 메뉴 css*/
        body {
            margin: 0;
            font-family: 'Noto Sans KR', sans-serif;
            font-weight: 500;
            min-width: 1100px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        nav ul {
            display: flex;
            list-style: none;
            padding-left: 0;
        }
        nav ul li {
            font-size: 22px;
            padding: 10px 12px;
            margin-left: 70px;
            margin-right: 70px;
            white-space: nowrap;
        }
        nav ul li a {
            color: white;
            font-weight: bolder;
        }
        *        { margin:0; padding: 0; }
        .board:hover .menu-sub {
            visibility: inherit;
            pointer-events: auto;
            display: block;
        }
        .menu-sub {
            background: white;
            position: absolute;
            border: 2px solid #1b5ac2;
            transform: translate(-38px,10px);
            font-size: 10px;
            text-align: center;
            font-weight: bold;
            padding-left: 0;
            list-style: none;
            white-space: nowrap;
            display: none;
            visibility: hidden;
        }
        .menu-sub li {
            margin: 0;
            padding-left: 30px;
            padding-right: 30px;
        }
        .menu-sub li a{
            color: black;
            font-weight: bolder;
        }
        /*버튼 css*/
        .confirm-button {
            text-transform: uppercase;
            outline: 0;
            background: #1b5ac2;
            width: 200px;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .confirm-button:hover,.confirm-button:active,.confirm-button:focus {
            background: darkblue;
        }
    </style>
    <title>시사제이</title>
</head>
<body>
<script type="text/javascript" src="signup2.js"></script>
<script>
    function checkPW() {
        var input = document.getElementById('password').value;
        if (input == ""){
            alert("비밀번호를 입력해주세요.");
            return false;
        }else {

        }
        var input = document.getElementById('password_re').value;
        if (input == ""){
            alert("비밀번호확인을 입력해주세요.");
            return false;
        }else {

        }
        return true;
    }
</script>
<div class="home_up" style="padding-left: 70px; width: 1030px; margin-left: auto; margin-right: auto; display: flex; align-items: center;">
    <div class="home_logo" style="font-size: 50px; margin-top: 50px; margin-left: 50px">
        <i class="far fa-newspaper"  style="color: #007bff"></i>
        <a style="font-weight: bolder;" href="../index.php">시사제이</a>
    </div>
    <div style="margin-left: 60px; margin-top:45px; height: 40px; width: 500px; border: 1px solid #1b5ac2; background: #ffffff;">
        <input  style="font-size: 16px; width: 425px; padding: 10px; border: 0px; outline: none; float: left; color: #007bff" type="text" placeholder="뉴스 & 게시판 통합 검색">
        <button style="width: 50px; height: 100%; border: 0px; background: #1b5ac2; outline: none; float: right; color: #ffffff; ">검색</button>
    </div>
</div>
<div style="background-color: #1b5ac2; width: 100%;">
    <nav style="width: 1100px; display: flex;
    justify-content: space-between;margin-left: auto; margin-right: auto;
    align-items: center;margin-top: 20px; padding-left: 0px;">
        <ul>
            <li class="board"><a href="">게시판</a>
                <ul class="menu-sub">
                    <li><a href="board.php?board=1">시사</a></li>
                    <li><a href="board.php?board=2">IT/과학</a></li>
                    <li><a href="board.php?board=3">자유</a></li>
                </ul>
            </li>
            <li><a href="/jaypublic/news.php?type=1">정치</a></li>
            <li><a href="/jaypublic/news.php?type=2">경제</a></li>
            <li><a href="/jaypublic/news.php?type=3">IT/과학</a></li>
            <li><a href="/jaypublic/news.php?type=4">사회</a></li>
        </ul>
    </nav>
</div>
<div style="width: 1100px; margin: auto;">
    <p style="margin-top: 50px; font-size: 35px; font-weight: bolder; text-align: center;">비밀번호 수정</p>
    <div style="width: 1100px; border: 1px solid #007bff; margin-top: 30px;"></div>
    <form action="change-pw-request.php" method="post" onsubmit="return checkPW()" style="text-align: center; margin-top: 50px;">
        <div>
            <div>
                <label style="font-size: 20px; font-weight: bolder;" for="password">새로운 비밀번호 : </label>
                <input style=" border: 1px solid #007bff; height: 40px;"  type="password" name="userPW" id="password" maxlength="20" onchange="password_check()">
            </div>
            <div style="margin-top: 15px;">
                <label style="font-size: 20px; font-weight: bolder;" for="password_re">새로운 비밀번호 확인: </label>
                <input style=" border: 1px solid #007bff; height: 40px;"  type="password" id="password_re" maxlength="20" onchange="password_check()">&nbsp;&nbsp;
            </div>
            <span style="margin-top: 20px; font-size: 20px;" id="password_check"value=""></span>
        </div>
        <div style="margin-top: 50px;">
            <input class="confirm-button" type="submit" value="확인">
        </div>
    </form>
</div>


</body>
</html>
<?php
include "bottomInfo.php";
?>



