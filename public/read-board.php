<?php
$board_number = $_GET['board_number'];
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);

$sql = "select * from freeBoard where nubmer='$board_number'";
$result = $mysqli->query($sql);
//while($row = $result->fetch_object()){
//    $board['board_title'] = $row->title;
//    $board['board_content'] = $row->content;
//    $board['board_user_id'] = $row->user_id;
//    $board['board_time'] = $row->write_datetime;
//    $board['board_hit'] = $row->hit;
//    $userID = $board['board_user_id'];
//}
while($row = $result->fetch_assoc()){
    $board['board_title'] = $row["title"];
    $board['board_content'] = $row["content"];
    $board['board_user_id'] = $row["user_id"];
    $board['board_time'] = $row["write_datetime"];
    $board['board_hit'] = $row["hit"];
    $userID = $board['board_user_id'];
}
//hile($row = mysqli_fetch_assoc($query)){
//    echo "이름 : ".$row["fname"];
//    echo " 가격 : ".$row["fprice"];
//    echo " 만족도 : ".$row["frank"];
//    echo "<br/>";
//}
//$sql2 = "select * from userInfo where id='$userID'";
//$result = $mysqli->query($sql2);
//while($row = $result->fetch_object()){
//    $board['board_user_nickname'] = $row->nickname;
//}
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jay shop</title>
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <link rel= "stylesheet"  href="../style.css">
</head>
<body>
<?php include 'menu.php' ?>
<div style="width: 800px; margin-left: auto; margin-right: auto; margin-top: 30px;">
    <p></p>
</div>
</body>
</html>