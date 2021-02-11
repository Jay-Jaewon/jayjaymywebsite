<?php
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);

//날짜계산  72시간 이전 글중 추천수가 많은 순으로 출력.
date_default_timezone_set('Asia/Seoul');
//72시간 이전
$timeStamp = strtotime("-72 hours");
$timeString = date("Y-m-d H:i:s", $timeStamp);

$boardType = $_REQUEST['boardType'];
switch ($boardType){
    case 0:
        $boardType = "currentBoard"; break;
    case 1:
        $boardType = "scienceBoard"; break;
    case 2:
        $boardType = "freeBoard"; break;
    default:
        //TODO 예외처리를 어떻게 해야할지 모르겟다.
}
//3일 동안 추천수가 많은 글 순으로 불러오는 쿼리.
//                    $sql = "select * from $boardType where date > '$timeString' order by good desc limit 10";
//현재 계속 추천글을 작성하기 힘드므로 입시적으로 추천수가 1이상인 글을 날짜별로 불러오는 것으로 대체
$sql = "select * from $boardType where good > 1 order by date desc limit 10";
$result = $mysqli->query($sql);
$i = 1;
while ($row = $result->fetch_array()){
//    echo "".mb_strlen($row['title'],"UTF-8");
// 오류가나는데 이유를 모르겠다.
    ?>
    <span style="font-weight: bolder; font-size: 20px;"> <?php echo $i;?> .  </span>
    <a style="font-weight: bolder; font-size: 20px;" href="/jaypublic/read.php?number=<?php echo $row['number'];?>&board=<?php echo $_REQUEST['boardType']+1;?>"> <?php echo $row['title']; ?></a>
    <br>
    <?php
    $i++;
}
?>

