<?php
/*
 * include, require 이용시에는 절대 상대경로를 잘 이해 해야 함
 * include : 포함 할 파일이 없어도 진행
 * include_once : 같은 파일을 여러번 지정 되어도 한번만 로딩 (include 확장)
 * require : 포함 할 파일이 없으면 에러
 * require_once 같은 파일을 여러번 지정 되어도 한번만 로딩 (require 확장) - 성향이 있겠으나 막장 개말을 방지하기 위해서 추천
 */

require_once ('Snoopy-2.0.0.tar.gz/Snoopy.class.php');

//스누피 생성.
$snoopy = new Snoopy;
$snoopy->httpmethod = "POST";
//헤더값에 따라 403 에러가 발생 할 경우 셋팅
$snoopy->agent = $_SERVER['HTTP_USER_AGENT'];
$snoopy->referer = "https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=100&date=20200921";



/*
 * fetch($URI) : 입력받은 주소의 html소스를 텍스트 형식으로 $result에 저장합니다.
 * fetchlinks($URI) : fetch와 비슷하지만 링크만을 배열의 형태로 $result에 저장합니다. 링크를 타고 가하는 작업에 유용
 * fetchtext($URI) : fetch와 비슷하지만 스크립트를 제외한 텍스트만 $results에 저장합니다.
 * fetchform($URI) : fetchd와 비슷하지만 폼 부분을 html 형식으로 $results에 저장합니다.
 * submit($URI, $formvars="", $formfiles="") : 폼에 여러 변수를 붙여서 전송 할 수 있습니다. 보통 많은 로그인 폼에서 유용하게 사용
 * setcookies() : 종종 쿠키정보를 유지해야하는 경우가 있는데 그럴때 사용합니다.
 */

$snoopy->fetch('https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=100&date=20200921');
$all = $snoopy->results;
$all =  iconv("EUC-KR", "UTF-8", $all);
echo "all <br/>";
echo $all;

echo "--------links<br/>";

$snoopy->fetchlinks('https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=100&date=20200921');
$all = $snoopy->results;
echo $all[0] . "<br/>";
foreach ($all as $val){
    echo $val ."<br/>";
}
$snoopy->fetchtext('https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=100&date=20200921');
$all = $snoopy->results;
//$all = iconv("EUC-KR","UTF-8",$all);
echo "-------------texts<br/>";

foreach ($all as $val){
    echo $val ."<br/>";
}





?>