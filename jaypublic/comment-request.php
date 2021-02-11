<?php
session_start();
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
if ($userLogin){

}else{
    echo '<script>alert("로그인을 해야 댓글을 작성할 수 있습니다!");</script>';
    echo '<script>history.back();</script>';
}
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';

$db_conn = @mysqli_connect($host,$user,$password,$database);
if(!$db_conn) {
    //db connect fail
    $error = mysqli_connect_error();
    $errno = mysqli_connect_errno();
    print "$errno: $error\n";
    echo "$errno: $error<br />";
}else{
    //db connect success
}
$userID = $_SESSION['userID'];
$userNickName = $_SESSION['userNickName'];
$content = $_POST['content'];
$boardType = $_POST['boardType'];
$boardNumber = $_POST['boardNumber'];

$query = "insert into comment (number, userID, userNickName, content, boardType, boardNumber)";
$query .= "values (0, '$userID', '$userNickName', '$content','$boardType',$boardNumber)";
$result = mysqli_query($db_conn, $query);
if ($result){
    echo '<script>alert("댓글이 작성되었습니다.");</script>';
}else{
    echo '<script>alert("작성오류, 글이 작성되지 않았습니다."); </script>';
    echo '<script>history.back();</script>';
}
mysqli_close($db_conn);
switch ($boardType){
    case 'currentBoard': $boardType = 1; break;
    case 'scienceBoard': $boardType = 2; break;
    case 'freeBoard': $boardType = 3; break;
}

?>

<script type="text/javascript">
    location.href="read.php?number="+<?php echo $boardNumber; ?>+"&board="+<?php echo $boardType;?>;
</script>
