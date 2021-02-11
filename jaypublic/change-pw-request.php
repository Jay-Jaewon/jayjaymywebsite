<?php
session_start();
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
if ($_SESSION['state'] == "userInfo"){
    //ok
    //unset($_SESSION['state']);
    //보안상 이런것들이 필요한 것 같다.
}else{
    //비정상적인 접근
    echo $_SESSION['state'];
    echo '<script>alert("비정상적인 접근 입니다."); location.replace("/index.php");</script>';
}
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$conn = mysqli_connect($host,$user,$password,$database);
$id = $_SESSION['userID'];
if (isset($_POST['userPW'])) {
    $password = $_POST['userPW'];
}else{
    //비정상적인 접근
    echo '<script>alert("비정상적인 접근 입d니다."); location.replace("/index.php");</script>';
}

$query = "update jayUserInfo set password ='$password' where id = '$id'";
$result = mysqli_query($conn, $query);
if ($result){
    $query = "select * from jayUserInfo where id = '$id'";
    $result = mysqli_query($conn,$query);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['userPW'] = $row['password'];
    }
    echo '<script> alert("수정완료!"); location.replace("/index.php");</script>';
}else{
    echo '<script> alert("수정실패!"); location.replace("/index.php");</script>';
}
unset($_SESSION['state']);
mysqli_free_result($result);
mysqli_close($conn);
?>