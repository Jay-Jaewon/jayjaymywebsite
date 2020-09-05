<?php
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';

$mysqli = new mysqli($host,$user,$password,$database);
$board_content = htmlspecialchars($_POST['contents'],ENT_QUOTES, 'UTF-8');
$board_title = htmlspecialchars($_POST['title'],ENT_QUOTES, 'UTF-8');

session_start();
$board_user_id= $_SESSION['userID'];
$sql = "insert into freeBoard(user_id, title, content)";
$sql .= " values('$board_user_id','$board_title','$board_content')";
$result = $mysqli->query($sql);

if($result){
    $board_no = mysqli_insert_id($mysqli);
    echo "<script>
          alert('글쓰기에 성공');
        </script>";
    header('Location: read-boared.php?board_number='.$board_no);

}else{
    echo "<script>
          alert('글쓰기에 실패하였습니다.');
          history.back();
        </script>";
}
?>