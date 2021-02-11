<?php
session_start();
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';

//id overlaping check
$db_conn = @mysqli_connect($host,$user,$password,$database);
if(!$db_conn) {
    //db connect fail
    $error = mysqli_connect_error();
    $errno = mysqli_connect_errno();
    print "$errno: $error\n";
    echo "$errno: $error<br/>";
}else{
    //db connect success
}
$strID = htmlspecialchars($_POST['userID'], ENT_QUOTES, 'UTF-8');
$query = "select * from jayUserInfo where id = '$strID'";
$result = mysqli_query($db_conn, $query);

if( $result ){
    //query success
    //echo "조회된 행의 수 : ".mysqli_num_rows($result)."<br />";
    if (mysqli_num_rows($result) == 0){
        //no overlaping id
    }else{
        //overlaping id
        echo '<script>alert("중복된 아이디 입니다!");</script>';
        mysqli_free_result($result);
        mysqli_close($db_conn);
        echo '<script>location.replace(history.back());</script>';
        exit;
    }
    mysqli_free_result($result);
}else {
    //query fail
    echo "Error: : ".mysqli_error($db_conn);
}
//nickname overlaping check
$strNickName = htmlspecialchars($_POST['userNickName'],ENT_QUOTES, 'UTF-8');
$query = "select * from jayUserInfo where nickname ='$strNickName'";
$result = mysqli_query($db_conn, $query);
if( $result ){
    //query success
    //echo "조회된 행의 수 : ".mysqli_num_rows($result)."<br />";
    if (mysqli_num_rows($result) == 0){
        //no overlaping nickname
    }else{
        //overlaping nickname
        echo '<script>alert("중복된 닉네임 입니다!");</script>';
        mysqli_free_result($result);
        mysqli_close($db_conn);
        echo '<script>location.replace(history.back());</script>';
        exit;
    }
    mysqli_free_result($result);
}else {
    //query fail
    echo "Error: : ".mysqli_error($db_conn);
}
mysqli_close($db_conn);
//ends overlaping checks

//start inserting data
$mysqli = new mysqli($host,$user,$password,$database);

$userID = htmlspecialchars($_POST['userID'], ENT_QUOTES, 'UTF-8');
$userEmail = htmlspecialchars($_POST['userEmail'],ENT_QUOTES, 'UTF-8');
$userPW = htmlspecialchars($_POST['userPW'],ENT_QUOTES, 'UTF-8');
$userAnswer = htmlspecialchars($_POST['userPWAnswer'],ENT_QUOTES, 'UTF-8');
$userNickName = htmlspecialchars($_POST['userNickName'],ENT_QUOTES, 'UTF-8');
$userReceive = htmlspecialchars($_POST['userReceive'], ENT_QUOTES, 'UTF-8');

$sql = "insert into jayUserInfo (id, password, nickname, email, answer, receive)";
$sql = $sql. "values('$userID', '$userPW', '$userNickName', '$userEmail', '$userAnswer', '$userReceive')";

if($mysqli->query($sql)){
    echo '<script>alert("회원가입이 되였습니다!");</script>';
}else{
    echo '<script>alert("회원가입이 실패!");</script>';
//    echo $userID;
//    echo $userPW;
//    echo $userNickName;
//    echo $userEmail;
//    echo $userAnswer;
//    echo $userReceive;
}
mysqli_close($mysqli);

?>
<script>
    location.replace("../index.php");
</script>
