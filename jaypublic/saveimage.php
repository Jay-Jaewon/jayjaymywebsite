<?php
session_start();
//사용자 아이디와 업로드 시간으로 이미지이름을 지정하고 저장함.
$userEmail = $_SESSION['userEmail'];
$timeNow = date("Y-m-d/H:i:s");

if ($_FILES['file']['name']){
    if(!$_FILES['file']['error']){
        $name = $userEmail.$timeNow;
        $ext = explode('.',$_FILES['file']['name']);
        $filename =$name.'.'.$ext[1];
        $destination = 'upload/'.$filename; // 디렉토리는 상황에 따라 변경해야함.
        $location = $_FILES["file"]["tmp_name"];
        move_uploaded_file($location, $destination);
        //echo
    } else{
        echo $message = '이미지 업로드 오류!'.$_FILES['file']['error'];
    }
}
?>