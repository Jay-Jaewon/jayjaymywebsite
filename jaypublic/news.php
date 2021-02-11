<?php
session_start();
//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userEmail'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}

require_once ('../Snoopy-2.0.0.tar.gz/Snoopy.class.php');
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
//$links[1][짞/홀수번호만 사용 58 또는 59 까지]
//$title[1][0,3,6 ... 3의 배수만 사용 87까지]
//$office[1][0~29] 까지.
//$img[1][0~29까지]
switch ($_GET['type']){
    case 1: $type = '정치';
        $snoopy->fetch($politics);
        $all = $snoopy->results;
        $all = iconv("EUC-KR","UTF-8",$all);
        preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
        $pol_news = $html[0][0];
        //변수 초기화
        $all = NULL;
        $html = NULL;
        preg_match_all('/href="(.*?)"/is',$pol_news,$links);
        preg_match_all('/title="(.*?)"/is',$pol_news,$title);
        preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$pol_news,$office);
        preg_match_all('/img src="(.*?)"/is',$pol_news,$img);
        preg_match_all('/<div class="ranking_lede">(.*?)<\/div>/is',$pol_news,$content);

        break;
        //정치
    case 2: $type = '경제';
        //경제.
        $snoopy->fetch($economy);
        $all = $snoopy->results;
        $all = iconv("EUC-KR","UTF-8",$all);
        preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
        $eco_news = $html[0][0];
        $all = NULL;
        $html = NULL;
        preg_match_all('/href="(.*?)"/is',$eco_news,$links);
        preg_match_all('/title="(.*?)"/is',$eco_news,$title);
        preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$eco_news,$office);
        preg_match_all('/img src="(.*?)"/is',$eco_news,$img);
        preg_match_all('/<div class="ranking_lede">(.*?)<\/div>/is',$eco_news,$content);

        break;
    case 3: $type = 'IT/과학';
        //IT/과학
        $snoopy->fetch($science);
        $all = $snoopy->results;
        $all = iconv("EUC-KR","UTF-8",$all);
        preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
        $sci_news = $html[0][0];
        $all = NULL;
        $html = NULL;
        preg_match_all('/href="(.*?)"/is',$sci_news,$links);
        preg_match_all('/title="(.*?)"/is',$sci_news,$title);
        preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$sci_news,$office);
        preg_match_all('/img src="(.*?)"/is',$sci_news,$img);
        preg_match_all('/<div class="ranking_lede">(.*?)<\/div>/is',$sci_news,$content);

        break;
    case 4: $type = '사회';
        //사회.
        $snoopy->fetch($society);
        $all = $snoopy->results;
        $all = iconv("EUC-KR","UTF-8",$all);
        preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
        $soc_news = $html[0][0];
        $all = NULL;
        $html = NULL;
        preg_match_all('/href="(.*?)"/is',$soc_news,$links);
        preg_match_all('/title="(.*?)"/is',$soc_news,$title);
        preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$soc_news,$office);
        preg_match_all('/img src="(.*?)"/is',$soc_news,$img);
        preg_match_all('/<div class="ranking_lede">(.*?)<\/div>/is',$soc_news,$content);

        break;
    default:
        echo '<script> alert("잘못된 접근입니다."); location.replace("/index.php") </script>';
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

        table.type09 {
            border-collapse: collapse;
            text-align: center;
            line-height: 1.5;

        }
        table.type09 thead th {
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            color: #369;
            border-bottom: 3px solid #036;
        }
        table.type09 tbody th {
            width: 150px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #1b5ac2;
            background: #f3f6f7;
        }
        table.type09 td {
            width: 350px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #1b5ac2;
        }
        .table-content {
            padding-top: 10px;
            padding-bottom: 10px;
            cursor: pointer;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 920px;
            height: 230px;
        }

    </style>
    <title>시사제이</title>
</head>
<body>
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

<div>
    <p style="margin-top: 50px; text-align: center; font-size: 40px; font-weight: bolder; color: black"><?php echo "오늘의 ".$type." 뉴스";?></p>
    <div style="width: 1200px; margin-left: auto; margin-right: auto; margin-top: 20px;">
        <table class="type09">
            <thead>
            <tr>
                <th style="width: 80px;" scope="cols">번호</th>
                <th style="width: 920px;" scope="cols">기사</th>
                <th style="width: 200px;" scope="cols">출판사</th>
            </tr>
            </thead>
            <tbody>

            <?php
            for($i =0; $i <30; $i++){
                $num = $i +1;
                $imgSrc = "'".$img[1][$i]."'";
                $titleText = $title[1][$i*3];
                $linkAddress = 'https://news.naver.com'.$links[1][$i*2];
                $officeName = $office[1][$i];
                $contentText = $content[1][$i];
                echo "<tr><td><p style='font-size: 17px; font-weight: bolder; margin: auto;'>$num</p></td><td><div class='table-content'><a href=$linkAddress><img  width='200px;' height='140px;' src=$imgSrc </div><p style='margin: 10px; font-weight: bolder; font-size: 20px;'>$titleText</p><p>$contentText</p></a></td><td><p style='font-size: 17px; font-weight: bolder; margin: auto;'>$officeName</p></td></tr>";
            }
            ?>

            </tbody>
        </table>
    </div>

</div>
</body>
</html>

<?php
include "bottomInfo.php";
?>


