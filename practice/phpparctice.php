<?php
$roll = rand(1,6);
echo '<p> 6이 나오면 승리합니다. </p>';
echo '<p>주사위에서 나온 숫자 : ' . $roll . '</p>';

if ($roll == 6){
    echo  '<p> 승리 !</p>';
} else {
    echo '<p> 패배 !</p>';
}
echo '<p>게임에 참여해 주셔서 감사합니다.</p>';

for ($coun =1; $coun <= 9; $coun++){
    echo $coun . ' ';
}
echo '<p></p>';
$coun = 1;
while ($coun <= 20){
    echo $coun . ' ';
    $coun++;
}

$myArry = ['하나','2','three'];
for($i =0; $i<3;$i++){
    echo  $myArry[$i] . ' ';
}
$name = $_GET['name'];
echo $name . '님 홈페이지 방문을 환영합니다.'
?>