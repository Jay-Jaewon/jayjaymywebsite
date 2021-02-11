<?php
session_start();
//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
if (($_SESSION['state']) == "userInfo"){
    //ok
    //unset($_SESSION['state']);
    //보안상 이런것들이 필요한 것 같다.
}else{
    //비정상적인 접근
    echo '<script>alert("비정상적인 접근 입니다."); location.replace("/index.php");</script>';
}
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$conn = mysqli_connect($host,$user,$password,$database);
$id = $_SESSION['userID'];
$nickname = $_POST['userNickName'];
$email = $_POST['userEmail'];
$answer = $_POST['userPWAnswer'];
$receive = $_POST['userReceive'];
if ($_SESSION['userNickName'] == $_POST['userNickName']){
    //닉네임 안바꿈
}else{
    $query = "select * from jayUserInfo where nickname = '$nickname'";
    $result = mysqli_query($conn,$query);
    if($result){
        if(mysqli_num_rows($result) == 0){
            //중복없음
            $query = "update jayUserInfo set nickname='$nickname' where id = '$id'";
            mysqli_query($conn,$query);
        }else{
            //중복있음
            echo '<script>alert("중복된 닉네임 입니다."); location.replace(history.back());</script>';
            mysqli_free_result($result);
            mysqli_close($conn);
            exit;
        }
    }else{
        echo "Error : ".mysqli_error($conn);
        mysqli_free_result($result);
        mysqli_close($conn);
        exit;
    }
}
$query = "update jayUserInfo set email='$email', answer='$answer', receive='$receive' where id = '$id'";
mysqli_query($conn, $query);
$query = "select * from jayUserInfo where id = '$id'";
$result = mysqli_query($conn,$query);
if($result){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['userNickName'] = $row['nickname'];
    $_SESSION['userEmail'] = $row['email'];
}
echo '<script> alert("수정완료!"); location.replace("/index.php");</script>';
unset($_SESSION['state']);
mysqli_free_result($result);
mysqli_close($conn);
?>