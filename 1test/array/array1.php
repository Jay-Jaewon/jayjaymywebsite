<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p style="font-size: 30px; text-align: center">Array Cookie Test1</p>
<form method="post" action="array.php">
    <input type="checkbox" name="makeCookie"/>
    <span>생성여부</span>
    <input type="checkbox" name="pushCookie"/>
    <span>숫자 추가</span>
    <input type="number" name="pushNumber">
    <input type="submit" value="쿠키만들기"/>
    <input type="checkbox" name="test3"/>
    <span>쿠키테스트 3</span>

</form>
<?php
//쿠키 1 출력
if(isset($_COOKIE['testCookie1'])){
    $cookie1 = unserialize($_COOKIE['testCookie1']);
    echo "쿠키1 <br/>";
    print_r($cookie1);
    echo "<br/>";
}else{
    echo "쿠키1이 생성되지 않았습니다.<br/>";
}
//쿠키 2 출력
if(isset($_COOKIE['testCookie2'])){
    $cookie2 = unserialize($_COOKIE['testCookie2']);
    echo "쿠키2 <br/>";
    print_r($cookie2);
    echo "<br/>";
}else{
    echo "쿠키2가 생성되지 않았습니다.<br/>";
}

?>
<p style="font-size: 30px; text-align: center">Array Cookie Test2</p>
<?php
echo "1을 가지고 있나요?<br/>";
echo "쿠키 1:";
if(in_array(1,$cookie1)){
    echo "네</br>";
}else{
    echo "아니오</br>";
}

echo "쿠키 2:";
if(in_array(1,$cookie2)){
    echo "네</br>";
}else{
    echo "아니오</br>";
}
?>

<p style="font-size: 30px; text-align: center">PHP Variable Test Local & Global</p>
<?php
$hello = "hello world";
if(true){
    $val1 = "hello val1";
    $val2 = "hello val2";
    echo $hello." in local</br>";
}else{
    $val1 = "hi val1";
    $val3 = "hi val3";
    echo $hello."</br>";
}

echo "global </br>";
echo $val2;
echo $val3;
?>

<p style="font-size: 30px; text-align: center">PHP Cookie Test 3</p>
<?php
echo $_COOKIE['testCookie3'];
?>
<p style="font-size: 30px; text-align: center">PHP explode Test</p>
<?php
$string1 = "1";
$string2 = "1,2";
$list1 = explode(',',$string1);
$list2 = explode(',',$string2);
print_r($list1);
print_r($list2);
?>
<p style="font-size: 30px; text-align: center">PHP Time Test</p>
<?php

date_default_timezone_set('Asia/Seoul');
$timeDefault = date("Y-m-d")." 23:59:59";
$timeNow = date("Y-m-d H:i:s");
$timeGap = strtotime($timeDefault)-strtotime($timeNow);
//시간 차이를 초 단위로 변환해준다.
$seconds = ceil($timeGap);
echo "초 : $seconds</br>";
?>

</body>
</html>