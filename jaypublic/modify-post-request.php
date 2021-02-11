<?php
session_start();
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
if ($userLogin){
}else{
    echo '<script>alert("로그인을 해야 글을 수할 수 있습니다!");</script>';
    echo '<script>history.back();</script>';
}
//echo $_POST['title'];
//echo $_POST['contents'];
$boardUserID = $_SESSION['userID'];
$boardUserNickName = $_SESSION['userNickName'];
$boardContent = $_POST['contents'];
$boardNumber = $_POST['number'];
//$boardTitle = $_POST['title']
$boardTitle = htmlspecialchars($_POST['title'],ENT_QUOTES, 'UTF-8');
//$boardType = $_GET['boardType'];
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$db_conn = @mysqli_connect($host, $user, $password, $database);
if(!$db_conn) {
    $error = mysqli_connect_error();
    $errno = mysqli_connect_errno();
    print "$errno: $error\n";
    echo "$errno: $error<br />";
    exit;
}else{
// database connect success
}

$boardType = $_SESSION['boardType'];

//$query = "insert into $boardType (number, userID, userNickName, title, content, hit, likes, dislikes)";
//$query .= "values (0, '$boardUserID', '$boardUserNickName', '$boardTitle', '$boardContent',0,0,0)";
$query = "update $boardType set title = '$boardTitle', content ='$boardContent', userNickName = '$boardUserNickName'";
$query .= " where number = $boardNumber and userID = '$boardUserID'";

$result = mysqli_query($db_conn, $query);
if ($result){
    echo '<script>alert("수정되었습니다.");</script>';
}else{
    echo '<script>alert("수정오류, 글이 수정되지 않았습니다."); </script>';
    echo '<script>history.back();</script>';
}
unset($_SESSION['boardType']);
mysqli_close($db_conn);
//if($mysqli->query($sql)){
//    echo '<script>alert("작성되었습니다.");</script>';
//}else{
//    echo '<script>alert("작성오류, 글이 작성되지 않았습니다."); history.back();</script>';
//    $boardNumber = mysqli_insert_id($mysqli);
//    echo $boardNumber;
//}
switch ($boardType){
    case 'currentBoard': $boardType = 1; break;
    case 'scienceBoard': $boardType = 2; break;
    case 'freeBoard': $boardType = 3; break;
}
?>

<script type="text/javascript">
    location.href="board.php?board="+<?php echo $boardType; ?>;
</script>
