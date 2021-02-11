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
$snoopy->setcookies();
//헤더값에 따라 403 에러가 발생 할 경우 셋팅
$snoopy->agent = $_SERVER['HTTP_USER_AGENT'];
//$snoopy->referer = "https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=100&date=20200921";

//스누피의 fetch함수로 웹페이지 가져오기.
$snoopy->fetch('https://news.naver.com/main/ranking/popularDay.nhn?rankingType=popular_day&sectionId=100&date=20200921');

$all = $snoopy->results;
$all = iconv("EUC-KR","UTF-8",$all);
echo $all;

preg_match('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
//for($i=0; $i++; $i<sizeof($html)){
//    echo $html[i];
//}
echo $html[1];
echo "---";
echo $html[2];
?>