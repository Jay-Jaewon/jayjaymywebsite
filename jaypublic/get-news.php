<?php
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

//$links[1][짞/홀수번호만 사용 58 또는 59 까지]
//$title[1][0,3,6 ... 3의 배수만 사용 87까지]
//$office[1][0~29] 까지.
//$img[1][0~29까지]


////정치.
//$snoopy->fetch($politics);
//$all = $snoopy->results;
//$all = iconv("EUC-KR","UTF-8",$all);
//preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
//$pol_news = $html[0][0];
////변수 초기화
//$all = NULL;
//$html = NULL;
//preg_match_all('/href="(.*?)"/is',$pol_news,$pol_links);
//preg_match_all('/title="(.*?)"/is',$pol_news,$pol_title);
//preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$pol_news,$pol_office);
//preg_match_all('/img src="(.*?)"/is',$pol_news,$pol_img);

////경제.
//$snoopy->fetch($economy);
//$all = $snoopy->results;
//$all = iconv("EUC-KR","UTF-8",$all);
//preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
//$eco_news = $html[0][0];
//$all = NULL;
//$html = NULL;
//preg_match_all('/href="(.*?)"/is',$eco_news,$eco_links);
//preg_match_all('/title="(.*?)"/is',$eco_news,$eco_title);
//preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$eco_news,$eco_office);
//preg_match_all('/img src="(.*?)"/is',$eco_news,$eco_img);
//
////사회.
//$snoopy->fetch($society);
//$all = $snoopy->results;
//$all = iconv("EUC-KR","UTF-8",$all);
//preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
//$soc_news = $html[0][0];
//$all = NULL;
//$html = NULL;
//preg_match_all('/href="(.*?)"/is',$soc_news,$soc_links);
//preg_match_all('/title="(.*?)"/is',$soc_news,$soc_title);
//preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$soc_news,$soc_office);
//preg_match_all('/img src="(.*?)"/is',$soc_news,$soc_img);
//
////과학.
//$snoopy->fetch($science);
//$all = $snoopy->results;
//$all = iconv("EUC-KR","UTF-8",$all);
//preg_match_all('/<ol class="ranking_list">(.*?)<\/ol>/is', $all, $html);
//$sci_news = $html[0][0];
//$all = NULL;
//$html = NULL;
//preg_match_all('/href="(.*?)"/is',$sci_news,$sci_links);
//preg_match_all('/title="(.*?)"/is',$sci_news,$sci_title);
//preg_match_all('/class="ranking_office">(.*?)<\/div>/is',$sci_news,$sci_office);
//preg_match_all('/img src="(.*?)"/is',$sci_news,$sci_img);

?>