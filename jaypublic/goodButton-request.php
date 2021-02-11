<?php
session_start();

$boardType = $_REQUEST['boardType'];
$boardNumber = $_REQUEST['boardNumber'];
$boardNumber = intval($boardNumber);
$userID = $_SESSION['userID'];

$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);

//사용자가 추천한 사용자인지 확인한다.
$sql = "select * from good where userID = '$userID' and boardType = '$boardType' and boardNumber = $boardNumber";

$result = $mysqli->query($sql);

if($result->num_rows > 0){
//검색결과가 1개 이상이라면 사용자는 추천한 사람임.
    //->추천 취소 실행
    $sql = "delete from good where userID = '$userID' and boardType = '$boardType' and boardNumber = $boardNumber";
    if($mysqli->query($sql) === true){
        $sql = "update $boardType set  good = good - 1 where number = $boardNumber";
        if($mysqli->query($sql) === true){
            echo "00";
        }else{
            echo "000";
            echo "$sql";
            echo "쿼리오류 발생 : ".mysqli_error($mysqli);

        }
    }else{
        echo "001";
        echo "쿼리오류 발생 : ".mysqli_error($mysqli);

    }
}else if($result->num_rows == 0){
    //사용자는 추천하지 않은 사람임.
    //->추천 실행
    $sql = "insert into good(boardType, boardNumber, userID)";
    $sql = $sql."values('$boardType',$boardNumber,'$userID')";
    if($mysqli->query($sql) === true){
        $sql = "update $boardType set good = good + 1 where number = $boardNumber";
        if($mysqli->query($sql) === true){
            echo "01";
        }else {
            echo "002";
            echo "$sql";
            echo "쿼리오류 발생 : ".mysqli_error($mysqli);
        }
    }else{
        echo "003 <br>";
        echo "쿼리오류 발생 : ".mysqli_error($mysqli);

    }
}else {
    echo "004";
    echo "쿼리오류 발생 : ".mysqli_error($mysqli);

}
$mysqli->close();


?>