<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; chars=uft-8"/>
    <title> MYSQL - PHP 연결 테스트</title>
</head>
<body>
<?php
echo "MYSQL 연결 테스트 <br>";
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database_name = 'teamnova';

$conn = mysqli_connect($host, $user, $password, $database_name);

$query = mysqli_query($conn, 'select * from food');

if(mysqli_connect_errno($conn)){
    echo "데이터베이스 연결 실패";
}else{
    echo "데이터베이스 연결 성공";
    echo "<br/>";
}
while($row = mysqli_fetch_assoc($query)){
    echo "이름 : ".$row["fname"];
    echo " 가격 : ".$row["fprice"];
    echo " 만족도 : ".$row["frank"];
    echo "<br/>";
}
?>
</body>
</html>