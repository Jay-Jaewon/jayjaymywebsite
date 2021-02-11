<?php
session_start();
//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
?>
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
<p style="text-align: center; font-size: 30px; margin: 30px;"> <?php if($_POST['requestType'] == 'id_check') {
        echo '아이디';
    }
    if($_POST['requestType'] == 'nickname_check'){
        echo '닉네임';
    }?> 중복체크</p>
<p style="font-size: 30px; text-align: center; font-weight: bolder;"><?php if($_POST['requestType'] == 'id_check') {
        echo $_POST['userID'];
    }
    if($_POST['requestType'] == 'nickname_check'){
        echo $_POST['userNickName'];
    }?></p>
<?php
$type = $_POST['requestType'];
//echo $_POST['requestType'];
//echo $_POST['userID'];
//echo $_POST['userNickName'];
//echo "테스트";

// $type 은 아이디 중복체크, 닉네임 중복체크인지 구분함.
if ($type == "id_check"){
    $checkingStr = htmlspecialchars($_POST['userID'],ENT_QUOTES, 'UTF-8');
    $dbCol = 'id';
}
if ($type == "nickname_check"){
    $checkingStr = htmlspecialchars($_POST['userNickName'],ENT_QUOTES, 'UTF-8');
    $dbCol = 'nickname';
}

$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$db_conn = @mysqli_connect($host,$user,$password,$database);
$query = "select * from jayUserInfo where $dbCol = '$checkingStr'";
//echo $dbCol;
//echo $checkingStr;
$result = mysqli_query($db_conn, $query);
if ($result){
    //커리문 성공
   // echo "검색된 row 수 : ".mysqli_num_rows($result);
    if (mysqli_num_rows($result)== 0){
        //중복이 없는 경우
        ?>
    <p style="color:#007bff; font-size: 20px; text-align: center;">사용 가능한 <?php if($_POST['requestType'] == 'id_check') {
            echo '아이디';
        }
        if($_POST['requestType'] == 'nickname_check'){
            echo '닉네임';
        }?> 입니다.<p>
    <?php
    }else{
        //중복인 경우
        ?>
        <p style="color: red; font-size: 20px; text-align: center;">이미 사용중인 <?php if($_POST['requestType'] == 'id_check') {
                echo '아이디';
            }
            if($_POST['requestType'] == 'nickname_check'){
                echo '닉네임';
            }?> 입니다.</p>
    <?php
    }
}else{
    //실패
    echo "Error: : ".mysqli_error($db_conn);
}

mysqli_close($db_conn);
//끝
?>
</body>
</html>
<?php
include "bottomInfo.php";
?>