<?php
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host, $user, $password, $database);

//$numbers[] = 28;
//$numbers[] = 30;
//$numbers[] = 31;
//$numbers[] = 32;
//$numbers[] = 33;
//$numbers[] = 34;
//$numbers[] = 35;
//$numbers[] = 36;
//$numbers[] = 37;
//$numbers[] = 38;
//$numbers[] = 40;
//$numbers[] = 41;
//$numbers[] = 42;
//$numbers[] = 43;
//$numbers[] = 44;
for($i = 232; $i >25; $i--){
    $numbers[] = $i;
}

//foreach ($numbers as $num){
//    echo "$num <br>";
//}
// 결과 28 30 31 32 ... 44 출력함. good

foreach ($numbers as $num) {
    $sql = "select * from freeBoard where number = $num";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array();
    $userID = $row['userID'];
    $userNickName = $row['userNickName'];
    $title = $row['title'];
    $content = $row['content'];
    $query = "insert into freeBoard (number, userID, userNickName, title, content, hit, good, dislikes)";
    $query .= "values (0, '$userID', '$userNickName', '$title', '$content',0,0,0)";
    if ($mysqli->query($query) === true){
        echo "$num 완료 <br>";
    }
}
$mysqli->close();


?>