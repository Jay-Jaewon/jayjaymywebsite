<?php
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);
//$connection = mysqli_connect($host, $user, $password, $database);

$userID = htmlspecialchars($_POST['userID'],ENT_QUOTES, 'UTF-8');
$userPW = htmlspecialchars($_POST['userPW'],ENT_QUOTES, 'UTF-8');
$userAnswer = htmlspecialchars($_POST['userPWAnswer'],ENT_QUOTES, 'UTF-8');
$userNickName = htmlspecialchars($_POST['userNickName'],ENT_QUOTES, 'UTF-8');
$userName = htmlspecialchars($_POST['userName'],ENT_QUOTES, 'UTF-8');
$userEmail = htmlspecialchars($_POST['userEmail'],ENT_QUOTES, 'UTF-8')."@".htmlspecialchars($_POST[userEmailDNS],ENT_QUOTES,'UTF-8');
$userPostCode = htmlspecialchars($_POST['userPostCode'],ENT_QUOTES, 'UTF-8');
$userAddress = htmlspecialchars($_POST['userAddress'],ENT_QUOTES, 'UTF-8');
$userAddressDetail = htmlspecialchars($_POST['userAddressDetail'],ENT_QUOTES, 'UTF-8');
$userPhone1 = htmlspecialchars($_POST['userTel_1'],ENT_QUOTES, 'UTF-8');
$userPhone2 = htmlspecialchars($_POST['userTel_2'],ENT_QUOTES, 'UTF-8');
$userPhone3 = htmlspecialchars($_POST['userTel_3'],ENT_QUOTES, 'UTF-8');
$userPhone = $userPhone1.$userPhone2.$userPhone3;
$userBirth = htmlspecialchars($_POST['userBirth'],ENT_QUOTES, 'UTF-8');

$sql = "insert into userInfo (id,password,answer,nickname,name,email,postcode, address, address_detail,phone,birth)";
$sql = $sql."values( '$userID', '$userPW','$userAnswer','$userNickName','$userName','$userEmail','$userPostCode','$userAddress','$userAddressDetail','$userPhone','$userBirth')";
//$query = mysqli_query($connection, );
if($mysqli->query($sql)){
    echo '<script>alert("회원가입이 되였습니다!");</script>';
}else{
    echo '<script>alert("회원가입이 실패!");</script>';
}
mysqli_close($mysqli);


//echo "$userID<br>";
//echo "$userPW<br>";
//echo "$userAnswer<br>";
//echo "$userNickName<br>";
//echo "$userName<br>";
//echo "$userEmail<br>";
//echo "$userPostCode<br>";
//echo "$userAddress<br>";
//echo "$userAddressDetail<br>";
//echo "$userPhone<br>";
//echo "$userBirth<br>";
?>
<script>
    location.replace("../index.php");
</script>
