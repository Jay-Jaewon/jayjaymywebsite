<?php
/*
 * include, require 이용시에는 절대 상대경로를 잘 이해 해야 함
 * include : 포함 할 파일이 없어도 진행
 * include_once : 같은 파일을 여러번 지정 되어도 한번만 로딩 (include 확장)
 * require : 포함 할 파일이 없으면 에러
 * require_once 같은 파일을 여러번 지정 되어도 한번만 로딩 (require 확장) - 성향이 있겠으나 막장 개말을 방지하기 위해서 추천
 */

require_once ('../../Snoopy-2.0.0.tar.gz/Snoopy.class.php');

//스누피 생성.
$snoopy = new Snoopy;
$snoopy->httpmethod = "POST";
//$snoopy->setcookies();
//헤더값에 따라 403 에러가 발생 할 경우 셋팅
$snoopy->agent = $_SERVER['HTTP_USER_AGENT'];
//$snoopy->referer = "https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=100&date=20200921";

//스누피의 fetch함수로 웹페이지 가져오기.
$snoopy->fetch('https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=100&date=20200921');

$all = $snoopy->results;
$all = iconv("EUC-KR","UTF-8",$all);
//echo $all;
echo "all[0] echo<br/>";
echo $all[0];
echo "all[1] echo<br/>";
echo $all[1];
echo "all[2] echo<br/>";
echo $all[2];

//echo "----htmlspecialchars---<br/>";
//echo htmlspecialchars($all);
preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
//for($i=0; $i++; $i<sizeof($html)){
//    echo $html[i];
//}
echo "------ 따로출력<br/>";
//foreach ($html as $val) {
//    $i = 0;
//    foreach ($val as $sub) {
//        echo $sub . "<br/>";
//        echo "----...----<br/>";
//    }
//    echo "---$i----";
//    $i++;
//}
$whatiwant = $html[0][0];
echo "---whatiwant echo--<br/>";
echo $whatiwant;
echo "---whaitiwant printr<br/>";
//print_r($html);
preg_match_all('/href="(.*?)"/is',$whatiwant,$links);
preg_match_all('/title="(.*?)"/is',$whatiwant,$title);
preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$whatiwant,$office);
preg_match_all('/<div class="ranking_lede">(.*?)<\/div>/is',$whatiwant,$content);
print_r($links);
//$links[1][짞/홀수번호만 사용 58 또는 59 까지]
echo "---- title <br/>";
print_r($title);
//$title[1][0,3,6 ... 3의 배수만 사용 87까지]
echo "---- image <br/>";
preg_match_all('/img src="(.*?)"/is',$whatiwant,$img);
print_r($img);
//$img[1][0~29까지]
echo "---- office <br/>";
print_r($office);
//$office[1][0~29] 까지.
echo "----- contents <br/>";
print_r($content);
//$content[1][0~29] 까지.
//preg_match_all 해서 얻은 값의 첫번째 배열은 정규식앞뒤의 추가적인 문자가 딸려옴 (ex $links[0][n])
// 반면에 $links[1][n]내가 얻고자 하는 텍스트 그자체르 배열에담음. 헷갈릴까봐 이것을 사용하는 것으로 통일.
//echo "---links---<br/>";
//print_r($links);
//echo "--for반복분 출력---<br/>";
//
//echo "꿑";
//echo $links[0][0][0];
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .sub-news-title,{
            margin-top: 10px;
            font-size: 21px;
            font-weight: normal;
        }
        .sub-news-title a{
            text-decoration: none;
            color: black;
         }
        .sub-news-title a:hover{
            text-decoration: underline;
        }

    </style>
</head>
<body>
<div>
    <p><a href="https://news.naver.com<?php echo $links[1][0];?>">기사1</a></p>

</div>
<div style="font-weight: bold; padding-bottom: 10px; margin-left: 20px; margin-top: 10px; border-bottom: 2px solid #1b5ac2; width: 770px;">
    <p style="margin-top: 10px; margin-left: 10px; font-size: 35px; font-weight: bolder">오늘의 정치</p>
    <p class="sub-news-title">한겨레 PICK 안내 [속보] 코로나 신규확진 195명…17일 만에 200명 밑으로</p>
    <p class="sub-news-title">신규확진 195명, 17일만에 200명 아래로…중환자는 급증 154명(종합)</p>
    <p class="sub-news-title">한겨레 PICK 안내 [속보] 코로나 신규확진 195명…17일 만에 200명 밑으로</p>
    <p class="sub-news-title">신규확진 195명, 17일만에 200명 아래로…중환자는 급증 154명(종합)</p>
    <p class="sub-news-title">한겨레 PICK 안내 [속보] 코로나 신규확진 195명…17일 만에 200명 밑으로</p>
</div>
</body>
</html>
