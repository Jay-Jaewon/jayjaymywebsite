<?php
session_start();
//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel= "stylesheet"  href="/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
    <style>
        body {
            margin: 0;
            font-family: 'Noto Sans KR', sans-serif;
            font-weight: 500;
            min-width: 1100px;
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


        #login-form{
            width:200px;
            margin:100px auto;
            border: 1px solid gray;
            border-radius: 5px;
            padding: 15px;
        }
        /* inline이였던 요소들을 block으로 바꿈 */
        #login-form input, #login-form label{
            display:block;
        }
        #login-form label{
            margin-top: 10px;
        }
        #login-form input{
            margin-top: 5px;
        }
        /* 애트리뷰트 선택자 */
        #login-form input[type='image']{
            margin: 10px auto;
        }
    </style>
    <title>시사제이</title>

</head>
<body>
<div class="home_up" style="display: flex; align-items: center;">
    <div class="home_logo" style="font-size: 50px; margin-top: 50px; margin-left: 50px">
        <i class="far fa-newspaper"  style="color: #007bff"></i>
        <a href="index.php">시사제이</a>
    </div>
    <div style="margin-left: 60px; margin-top:45px; height: 40px; width: 500px; border: 1px solid #1b5ac2; background: #ffffff;">
        <input  style="font-size: 16px; width: 425px; padding: 10px; border: 0px; outline: none; float: left; color: #007bff" type="text" placeholder="뉴스 & 게시판 통합 검색">
        <button style="width: 50px; height: 100%; border: 0px; background: #1b5ac2; outline: none; float: right; color: #ffffff; ">검색</button>
    </div>
</div>
<div>
    <nav style="display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #1b5ac2;
    padding: 1px 25px; margin-top: 20px;">
        <ul>
            <li><a href="">홈</a></li>
            <li><a href="">사회</a></li>
            <li><a href="">경제</a></li>
            <li><a href="">연예</a></li>
            <li><a href="">게시판</a></li>
        </ul>
    </nav>
</div>
<div style="display: flex;">
    <div style="font-weight: bold; margin-top: 20px; margin-left: 20px; border: 1px solid black; width: 400px; height: 400px;">
        <p style="margin-top: 10px; margin-left: 10px; font-size: 18px">오늘의 사회이슈</p>
        <p>신규확진 195명, 17일만에 200명 아래로…중환자는 급증 154명(종합)</p>
        <p>한겨레 PICK 안내 [속보] 코로나 신규확진 195명…17일 만에 200명 밑으로</p>
        <p>신규확진 195명, 17일만에 200명 아래로…중환자는 급증 154명(종합)</p>
        <p>한겨레 PICK 안내 [속보] 코로나 신규확진 195명…17일 만에 200명 밑으로</p>
        <p>신규확진 195명, 17일만에 200명 아래로…중환자는 급증 154명(종합)</p>
        <p>한겨레 PICK 안내 [속보] 코로나 신규확진 195명…17일 만에 200명 밑으로</p>
    </div>
    <div style="font-weight: bold; margin-top: 20px; margin-left: 20px; border: 1px solid black; width: 400px; height: 400px;">
        <p style="margin-left: 10px; font-size: 18px">오늘의 경제이슈</p>
        <p>신규확진 195명, 17일만에 200명 아래로…중환자는 급증 154명(종합)</p>
        <p>한겨레 PICK 안내 [속보] 코로나 신규확진 195명…17일 만에 200명 밑으로</p>
        <p>신규확진 195명, 17일만에 200명 아래로…중환자는 급증 154명(종합)</p>
        <p>한겨레 PICK 안내 [속보] 코로나 신규확진 195명…17일 만에 200명 밑으로</p>
        <p>신규확진 195명, 17일만에 200명 아래로…중환자는 급증 154명(종합)</p>
        <p>한겨레 PICK 안내 [속보] 코로나 신규확진 195명…17일 만에 200명 밑으로</p>
    </div>
    <div style="margin-left: 20px;">
        <form id="login-form" method="post">
            <label class="legend">아이디</label>
            <input name="userid" type="text">
            <label class="legend">패스워드</label>
            <input name="passwprd" type="password">
            <input style="border: 1px solid #1b5ac2" type="image"  value="로그인">
        </form>
    </div>
</div>


</body>
</html>



