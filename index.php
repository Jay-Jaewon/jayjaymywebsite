<?php
session_start();

//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
unset($_SESSION['state']);

if(!$userLogin){
    if(isset($_COOKIE['userIDCookie'])){
        $host = 'localhost:3306';
        $user = 'root';
        $password = 'void>_<void';
        $database = 'teamnova';
        $conn = mysqli_connect($host,$user,$password,$database);
        $id = $_COOKIE['userIDCookie'];
        $query = "select * from jayUserInfo where id ='$id'";
        $result = mysqli_query($conn,$query);
        if($result){
            $row = mysqli_fetch_assoc($result);
            if(isset($_COOKIE['userPWCookie'])){
                $cookiePW = $_COOKIE['userPWCookie'];
                $hashPW = hash("sha256","$row[password]");
                if($cookiePW == $hashPW){
                    //인증성공
                    $_SESSION['userID'] = $row['id'];
                    $_SESSION['userPW'] = $row['password'];
                    $_SESSION['userNickName'] = $row['nickname'];
                    $_SESSION['userEmail'] = $row['email'];
                    $userLogin = true;
                }
            }

        }

    }
}


//뉴스글을 크롤링하는 부분
require_once ('Snoopy-2.0.0.tar.gz/Snoopy.class.php');
$snoopy = new Snoopy;
$snoopy->httpmethod = "POST";
$snoopy->agent = $_SERVER['HTTP_USER_AGENT'];
//오늘 날짜를 계산해서 주소에 입력해준다.
$date = date("Ymd");
// 분야별 뉴스 주소. 정치 경제 사회 과학/IT.
$politics = 'https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=100&date='.$date;
$economy = 'https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=101&date='.$date;
$society = 'https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=102&date='.$date;
$science = 'https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=105&date='.$date;


//정보를 가져올 주소를 입력함.
//
//$links[1][짞/홀수번호만 사용 58 또는 59 까지]
//$title[1][0,3,6 ... 3의 배수만 사용 87까지]
//$office[1][0~29] 까지.
//$img[1][0~29까지]


//정치.
$snoopy->fetch($politics);
$all = $snoopy->results;
$all = iconv("EUC-KR","UTF-8",$all);
preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
$pol_news = $html[0][0];
//변수 초기화
$all = NULL;
$html = NULL;
preg_match_all('/href="(.*?)"/is',$pol_news,$pol_links);
preg_match_all('/title="(.*?)"/is',$pol_news,$pol_title);
preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$pol_news,$pol_office);
//preg_match_all('/img src="(.*?)"/is',$pol_news,$pol_img);

//경제.
$snoopy->fetch($economy);
$all = $snoopy->results;
$all = iconv("EUC-KR","UTF-8",$all);
preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
$eco_news = $html[0][0];
$all = NULL;
$html = NULL;
preg_match_all('/href="(.*?)"/is',$eco_news,$eco_links);
preg_match_all('/title="(.*?)"/is',$eco_news,$eco_title);
preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$eco_news,$eco_office);
//preg_match_all('/img src="(.*?)"/is',$eco_news,$eco_img);

//사회.
$snoopy->fetch($society);
$all = $snoopy->results;
$all = iconv("EUC-KR","UTF-8",$all);
preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
$soc_news = $html[0][0];
$all = NULL;
$html = NULL;
preg_match_all('/href="(.*?)"/is',$soc_news,$soc_links);
preg_match_all('/title="(.*?)"/is',$soc_news,$soc_title);
preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$soc_news,$soc_office);
//preg_match_all('/img src="(.*?)"/is',$soc_news,$soc_img);

//과학.
$snoopy->fetch($science);
$all = $snoopy->results;
$all = iconv("EUC-KR","UTF-8",$all);
preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
$sci_news = $html[0][0];
$all = NULL;
$html = NULL;
preg_match_all('/href="(.*?)"/is',$sci_news,$sci_links);
preg_match_all('/title="(.*?)"/is',$sci_news,$sci_title);
preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$sci_news,$sci_office);
//preg_match_all('/img src="(.*?)"/is',$sci_news,$sci_img);

?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel= "stylesheet"  href="/style.css">-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>

    <script>
        function loginCheck() {
            var id = document.getElementById('id').value;
            var pw = document.getElementById('pw').value;
            if (id == ''){
                alert("아이디을 입력해 주세요!");
                return false;
            }
            if (pw == ''){
                alert("비밀번호를 입력해 주세요!");
                return false;
            }
            return true;
        }
        var num = 0;
        // 0 시사게시판
        // 1 과학게시판
        // 2 자유게시판
        function minusArrow() {
            num = num - 1;
            if (num < 0){
                num = 2;
            }
            var xmlhttp = new XMLHttpRequest();
            var goodPostType = document.getElementById('goodPostType');
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200){
                    //   document.getElementById("poll").innerHTML = this.responseText;
                    //   document.getElementById('poll').innerHTML = this.responseText;

                    document.getElementById("goodPost").innerHTML = this.responseText;

                }
            };
            xmlhttp.open("GET","jaypublic/get-weekGoodPost.php?boardType="+num, true);
            xmlhttp.send();
            if(num == 0){
                goodPostType.innerText = "시사게시판";
            }else if (num == 1){
                goodPostType.innerText = "IT/과학게시판";
            }else if (num == 2){
                goodPostType.innerText = "자유게시판";
            }
            //alert(num);
        }
        function plusArrow() {
            num = num + 1;
            if(num > 2){
                num = 0;
            }
            var xmlhttp = new XMLHttpRequest();
            var goodPostType = document.getElementById('goodPostType');
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200){
                    //   document.getElementById("poll").innerHTML = this.responseText;
                    //   document.getElementById('poll').innerHTML = this.responseText;

                    document.getElementById("goodPost").innerHTML = this.responseText;


                }
            };
            xmlhttp.open("GET","jaypublic/get-weekGoodPost.php?boardType="+num, true);
            xmlhttp.send();
            if(num == 0){
                goodPostType.innerText = "시사게시판";
            }else if (num == 1){
                goodPostType.innerText = "IT/과학게시판";
            }else if (num == 2){
                goodPostType.innerText = "자유게시판";
            }
            //alert(num);
        }

        function getGoodPost(num) {

        }
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
        /*뉴스 css*/
        .sub-news-title {
            color: black;
            margin-top: 10px;
            font-size: 21px;
            font-weight: bolder;
        }
        .sub-news-title:hover{
            text-decoration: underline;
        }

        /*로그인 폼 css*/
        .login-page {
            margin-left: 20px;
            width: 300px;

        }
        .login-div {
            border: 1px solid #1b5ac2;
            background: white;
            width: 260px;
            height: 200px;

            margin: 0 auto 50px;
            padding: 30px 20px;
            text-align: center;
        }
        /*추천글 css*/
        .good-posts-page {
            margin-left: 20px;
            width: 300px;
        }
        .good-posts{
            border: 1px solid #1b5ac2;
            background: white;
            width: 260px;
            height: 380px;
            margin: 0 auto 100px;
            padding: 10px 20px;
        }
        .good-posts-arrow-r {
            color: #1b5ac2;
            font-size: 30px;
            cursor: pointer;
        }

        .good-posts-arrow-l {
            color: #1b5ac2;
            font-size: 30px;
            cursor: pointer;
        }

        .login-div input {
            outline: 0;
            background: #f2f2f2;
            border: 0;
            margin: 0 0 10px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .login-button {
            margin-bottom: 10px;
            text-transform: uppercase;
            outline: 0;
            background: #1b5ac2;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .login-button:hover,.login-button:active,.login-button:focus {
            background: darkblue;
        }
       .account-text a:hover{
           text-decoration: underline;
       }
    </style>
    <title>시사제이</title>

</head>
<body>
<div class="home_up" style="padding-left: 70px; width: 1030px; margin-left: auto; margin-right: auto; display: flex; align-items: center;">
    <div class="home_logo" style="font-size: 50px; margin-top: 50px; margin-left: 50px">
        <i class="far fa-newspaper" style="color: #007bff"></i>
        <a style="font-weight: bolder;" href="index.php">시사제이</a>
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
                    <li><a href="jaypublic/board.php?board=1">시사</a></li>
                    <li><a href="jaypublic/board.php?board=2">IT/과학</a></li>
                    <li><a href="jaypublic/board.php?board=3">자유</a></li>
                </ul>
            </li>
            <li><a href="/jaypublic/news.php?type=1">정치</a></li>
            <li><a href="/jaypublic/news.php?type=2">경제</a></li>
            <li><a href="/jaypublic/news.php?type=3">IT/과학</a></li>
            <li><a href="/jaypublic/news.php?type=4">사회</a></li>

        </ul>
    </nav>
</div>

<div style="margin-top: 60px; display: flex; width: 1100px; margin-left: auto; margin-right: auto;">
    <div class="main">
        <div style="font-weight: bold; padding-bottom: 0px; margin-left: 20px; margin-top: 0px; border-bottom: 2px solid #1b5ac2; width: 770px;"></div>
        <div style="font-weight: bold; padding-bottom: 10px; margin-left: 20px; margin-top: 10px; border-bottom: 2px solid #1b5ac2; width: 770px;">
            <p style="margin-top: 10px; margin-left: 10px; font-size: 35px; font-weight: bolder">오늘의 정치</p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $pol_links[1][0];?>"><?php echo $pol_title[1][0]." - " .$pol_office[1][0] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $pol_links[1][2];?>"><?php echo $pol_title[1][3]." - " .$pol_office[1][1] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $pol_links[1][4];?>"><?php echo $pol_title[1][6]." - " .$pol_office[1][2] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $pol_links[1][6];?>"><?php echo $pol_title[1][9]." - " .$pol_office[1][3] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $pol_links[1][8];?>"><?php echo $pol_title[1][12]." - " .$pol_office[1][4] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $pol_links[1][10];?>"><?php echo $pol_title[1][15]." - " .$pol_office[1][5] ?></a></p>
        </div>
        <div style="font-weight: bold; padding-bottom: 10px; margin-left: 20px; margin-top: 10px; border-bottom: 2px solid #1b5ac2; width: 770px;">
            <p style="margin-top: 10px; margin-left: 10px; font-size: 35px; font-weight: bolder">오늘의 경제</p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $eco_links[1][0];?>"><?php echo $eco_title[1][0]." - " .$eco_office[1][0] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $eco_links[1][2];?>"><?php echo $eco_title[1][3]." - " .$eco_office[1][1] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $eco_links[1][4];?>"><?php echo $eco_title[1][6]." - " .$eco_office[1][2] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $eco_links[1][6];?>"><?php echo $eco_title[1][9]." - " .$eco_office[1][3] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $eco_links[1][8];?>"><?php echo $eco_title[1][12]." - " .$eco_office[1][4] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $eco_links[1][10];?>"><?php echo $eco_title[1][15]." - " .$eco_office[1][5] ?></a></p>
        </div>
        <div style="font-weight: bold;padding-bottom: 10px; margin-left: 20px; margin-top: 10px; border-bottom: 2px solid #1b5ac2; width: 770px;">
            <p style="margin-top: 10px; margin-left: 10px; font-size: 35px; font-weight: bolder">오늘의 IT/과학</p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $sci_links[1][0];?>"><?php echo $sci_title[1][0]." - " .$sci_office[1][0] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $sci_links[1][2];?>"><?php echo $sci_title[1][3]." - " .$sci_office[1][1] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $sci_links[1][4];?>"><?php echo $sci_title[1][6]." - " .$sci_office[1][2] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $sci_links[1][6];?>"><?php echo $sci_title[1][9]." - " .$sci_office[1][3] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $sci_links[1][8];?>"><?php echo $sci_title[1][12]." - " .$sci_office[1][4] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $sci_links[1][10];?>"><?php echo $sci_title[1][15]." - " .$sci_office[1][5] ?></a></p>
        </div>
        <div style="font-weight: bold;padding-bottom: 10px; margin-left: 20px; margin-top: 10px; border-bottom: 2px solid #1b5ac2; width: 770px;">
            <p style="margin-top: 10px; margin-left: 10px; font-size: 35px; font-weight: bolder">오늘의 사회</p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $soc_links[1][0];?>"><?php echo $soc_title[1][0]." - " .$soc_office[1][0] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $soc_links[1][2];?>"><?php echo $soc_title[1][3]." - " .$soc_office[1][1] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $soc_links[1][4];?>"><?php echo $soc_title[1][6]." - " .$soc_office[1][2] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $soc_links[1][6];?>"><?php echo $soc_title[1][9]." - " .$soc_office[1][3] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $soc_links[1][8];?>"><?php echo $soc_title[1][12]." - " .$soc_office[1][4] ?></a></p>
            <p class="sub-news-title"><a href="https://news.naver.com<?php echo $soc_links[1][10];?>"><?php echo $soc_title[1][15]." - " .$soc_office[1][5] ?></a></p>
        </div>
    </div>
    <div class="sub">
        <div class="login-page">
            <div class="login-div">
                <?php
                if($userLogin){
                    //로그인 상태
                    ?>
                    <p style="font-weight: bolder; font-size: 20px;" > <?php echo $_SESSION['userNickName']?> 님</p>
                    <div style="border: 1px solid #007bff; margin-top: 20px; margin-bottom: 30px; width: 100%; margin-left: auto; margin-right: auto;"></div>
                    <div style="margin-bottom: 20px; width: 100%; justify-content: space-between;">
                        <a style="font-weight: bold; color: black; border: 1px solid lightgrey; margin-right: 5px; padding: 8px;" href="/jaypublic/myActivity.php">&nbsp;&nbsp;&nbsp;&nbsp;내 활동 보기&nbsp;&nbsp;&nbsp;&nbsp;</a>
<!--                        <a style="font-weight: bold; color: black; border: 1px solid lightgrey; padding: 8px;" href="">내 댓글</a>-->
                        <a style="font-weight: bold; color: black; border: 1px solid lightgrey; padding: 8px;" href="/jaypublic/pw-check.php">&nbsp;&nbsp;&nbsp;회원정보&nbsp;&nbsp;&nbsp;</a>
                    </div>

                    <button style="margin-top: 20px;" class="login-button" onclick="location.href='jaypublic/log-out.php'">로그아웃</button>
                    <?php
                }else{
                    //비로그인 상태
                    ?>
                    <form action="jaypublic/log-in-request.php" onsubmit="return loginCheck()" method="post" class="login-form">
                        <input style="width: 100%;" type="text" id="id" name="userID" placeholder="ID"/>
                        <input style="width: 100%;" type="password" id="pw" name="userPW" placeholder="password"/>
                        <button class="login-button" onclick="onsubmit">로그인</button>
                        <label for="autoLogin"><input type="checkbox" id="autoLogin" name="autoLogin"/><span style="margin-left: 10px;">자동로그인</span></label>
                        <p class="account-text"><a href="jaypublic/sign-up.php" style="text-align: left;">회원가입</a>  | <a style="text-align: right;" href="#">아이디</a> / <a style="text-align: right;" href="#">비밀번호찾기</a> |</p>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="good-posts-page">
            <p style="color: #007bff; text-align: center; font-weight: bolder; font-size: 27px; margin-bottom: 10px; ">추천글</p>
            <div class="good-posts">
                <span onclick="minusArrow()" class="good-posts-arrow-l"  style="float: left" >◀︎</span>
                <span onclick="plusArrow()" class="good-posts-arrow-r" style="float: right" >▶︎</span>
                <p id="goodPostType" style="text-align: center; font-weight: bolder; font-size: 25px;">시사게시판</p>
                <br>
                <div id="goodPost" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                    <?php

                    $host = 'localhost:3306';
                    $user = 'root';
                    $password = 'void>_<void';
                    $database = 'teamnova';
                    $mysqli = new mysqli($host,$user,$password,$database);
                    //날짜계산  72시간 이전 글중 추천수가 많은 순으로 출력.
                    date_default_timezone_set('Asia/Seoul');
                    //72시간 이전
                    $timeStamp = strtotime("-72 hours");
                    $timeString = date("Y-m-d H:i:s", $timeStamp);
                    //3일 동안 추천수가 많은 글 순으로 불러오는 쿼리.
//                    $sql = "select * from $boardType where date > '$timeString' order by good desc limit 10";
                   //현재 계속 추천글을 작성하기 힘드므로 입시적으로 추천수가 1이상인 글을 날짜별로 불러오는 것으로 대체
                    $sql = "select * from currentBoard where good > 1 order by date desc limit 10";
                    $result = $mysqli->query($sql);
                    $i = 1;
                    while ($row = $result->fetch_array()){
                    ?>
                    <span style="font-weight: bolder; font-size: 20px;"> <?php echo $i;?> .  </span>
                    <a style="font-weight: bolder; font-size: 20px;" href="/jaypublic/read.php?number=<?php echo $row['number'];?>&board=<?php echo $_REQUEST['boardType']+1;?>"> <?php echo $row['title']; ?></a>
                    <br>
                    <?php
                    $i++;
                    }
                    ?>
                </div>

            </div>
        </div>




    </div>

</div>
<div class="etc" style="height: 10px">

</div>



</body>
</html>
<?php
include "jaypublic/bottomInfo.php";
?>
