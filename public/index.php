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
    <title>Jay shop</title>
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
</head>
<body>
    <nav class="navbar">
        <ul class="navbar_menu">
            <li class="menu_item">
                <a href="">Notice</a>
            </li>
            <li><a href="">News</a></li>
            <li><a href="">Products</a>
                <ul class="menu-sub">
                    <li><a href="public/products.php">전체</a></li>
                    <li><a href="">상의</a></li>
                    <li><a href="">하의</a></li>
                    <li><a href="">신발</a></li>
                    <li><a href="">악세사리</a></li>
                </ul>
            </li>

        </ul>

        <div class="navbar_logo">
            <a href="index.php"><i class="fas fa-hat-cowboy"></i></a>
            <a href="index.php">JAY</a>
        </div>

        <ul class="navbar_menu">
            <li class="menu_item"><a href="index.php">Home</a></li>
            <li class="menu_item"><a href="">Account</a>
                <ul class="menu-sub">
                    <?php
                    if ($userLogin){
                        ?>
                        <li><a href="public/logout.php" id="log">로그아웃</a></li>
                        <?php
                    }else{
                        ?>
                        <li><a href="public/login.php" id="log">로그인</a></li>
                        <?php
                    }
                        ?>
                    <li><a href="public/signup.php">회원가입</a></li>
                    <li><a href="">장바구니</a></li>
                    <li><a href="">찜목록</a></li>
                    <li><a href="public/member-info.php">회원정보</a></li>
                    <li><a href="">주문목록</a></li>
                </ul>
            </li>
            <li class="menu_item"><a href="">Community</a>
                <ul class="menu-sub">
                    <li><a href="public/board.php">자유게시판</a></li>
                    <li><a href="">상품후기</a></li>
                    <li><a href="">Q/A 고객센터</a></li>

                </ul>
            </li>
        </ul>
    </nav>
    <p style="font-weight: bolder; background-color: beige; margin: 0;text-align: end;">
       <?php
       if($userLogin){
           ?>
        <?php echo $_SESSION['userName']?> 님 반갑습니다.
        <?php
        }else{
          ?> 로그인이 되어있지 않습니다.
        <?php
       }?>
    </p>
    <div style="background-size: cover;">
        <img src="https://i.ytimg.com/vi/2plos3DB2sI/maxresdefault.jpg"
        style="width: 100%;height: 700px">
    </div>
    <div>
        <h2 style="font-size: 30px;margin-left: 100px;margin-top:300px;">
            상품
        </h2>
    </div>
    <div class="products">
        <img src="http://www.zavanas.com/shopimages/zavanas/0140000000322.jpg?1586518552"
        style="width: 250px;height: 250px">
        <img src="http://www.zavanas.com/shopimages/zavanas/0140000000322.jpg?1586518552"
             style="width: 250px;height: 250px">
        <img src="http://www.zavanas.com/shopimages/zavanas/0140000000322.jpg?1586518552"
             style="width: 250px;height: 250px">
    </div>
    <div class="products">
        <img src="http://www.zavanas.com/shopimages/zavanas/0140000000322.jpg?1586518552"
             style="width: 250px;height: 250px">
        <img src="http://www.zavanas.com/shopimages/zavanas/0140000000322.jpg?1586518552"
             style="width: 250px;height: 250px">
        <img src="http://www.zavanas.com/shopimages/zavanas/0140000000322.jpg?1586518552"
             style="width: 250px;height: 250px">
    </div>
    <div style="margin-top: auto; width: 100%; background-color: #F5F5F5">
        <div style="width: 100%; height: 1px; background-color: lightgray;">

        </div>
        <p style="font-size: 12px; margin-left: 40px;margin-top: 20px; margin-bottom: 10px;">
            About us Agreement Privacy Guide<br>
            Company : JAY | CEO : 송재원<br>
            [111-11-11111] | 2020-서울용산-00000 | [사업자정보확인] -임시 입니다.<br>
            138960 서울특별시 떙떙구 떙떙동 떙떙떙 1234호<br>
            개인정보관리책임자 : JAY &nbsp;&nbsp;&nbsp;&nbsp;CS Center : 02-1111-1111<br>
            15:00 - 18:00 / SAT.SUN.HOLIDAY OFF<br>
            zzzxxxccc3@naver.com&nbsp;&nbsp;&nbsp;&nbsp;
            우리 1002652393528 / 송재원<br>
            Hosting : local;&nbsp;&nbsp;&nbsp;&nbsp;
            임시 사이트 입니다.
        </p>

    </div>
</body>
</html>



