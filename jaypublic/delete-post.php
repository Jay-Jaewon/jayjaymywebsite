<?php
session_start();
//echo $_SESSION['userID'];
//echo $_GET['board'];
//echo $_GET['number'];

//necessary variables
$id = $_SESSION['userID'];
$number = $_GET['number'];

switch ($_GET['board']){
    case 1: $board = 'currentBoard'; break;
    case 2: $board = 'scienceBoard'; break;
    case 3: $board = 'freeBoard'; break;
}

//db variables
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
//데이터베이스 연결
$db_conn = @mysqli_connect($host,$user,$password,$database);

if(!$db_conn) {
    $error = mysqli_connect_error();
    $errno = mysqli_connect_errno();
    print "$errno: $error\n";
    echo "$errno: $error<br />";
}else{
    //db connection success
//    print "db연결 성공";
//    echo "db연결 성공";
}
$query = "delete from $board where number = '$number' and userID = '$id'";
//echo $query;
$result = mysqli_query($db_conn, $query);
if( $result ){
    //delete success
    echo '<script>alert("글이 삭제 되었습니다.");</script>';
}else{
    //delete fail
    echo "Error: : ".mysqli_error($db_conn);
    echo '<script>alert("글이 삭제 오류!");</script>';
}
echo "<script>location.replace(history.back());</script>";

?>