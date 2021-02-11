<?php
session_start();
//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}

$boardNumber = $_GET['number'];
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);
$boardType = $_GET['board'];

//쿠키 만료시간 구하기 현재시간을 기준으로 남은 하루시간(초)를 계산함.
//남은 시간은 오늘날짜 23:59:59 에서 현재 시간의 차이를 초단위로 계산함.

//서울로 타임존 설정.
date_default_timezone_set('Asia/Seoul');
$timeDefault = date("Y-m-d")." 23:59:59";
$timeNow = date("Y-m-d H:i:s");
$timeGap = strtotime($timeDefault)-strtotime($timeNow);
//시간 차이를 초 단위로 변환해준다.
$seconds = ceil($timeGap);

//게시판 별로 쿠키를 생성해 준다.
switch ($boardType){
    case 1:
        $boardType = 'currentBoard';
        if(isset($_COOKIE['currentCookie'])){
            //쿠키가 이미 생성된 경우
            $numbersText = $_COOKIE['currentCookie'];
            $numbersList = explode(',',$numbersText);
            if(in_array($boardNumber, $numbersList) === true){
                //글리스트에 해당글이 존재 -> 조회수 증가하지 않음.
            }else{
                //글리스트에 해당글이 존재하지 않음 -> 조회수 증가.
                $hitSql = "update currentBoard set hit = hit + 1 where number = $boardNumber";
                if($mysqli->query($hitSql) === true){
                    //쿼리문 성공
                    //리스트에 해당글을 추가하고 쿠키 수정.
                    $numbersText = $numbersText.","."$boardNumber";
                    setcookie('currentCookie',"$numbersText",time()+$seconds,"/");
                }else{
                    //쿼리문 실패
                    echo "Fail to update Post hit 1";
                }
            }
        }else{
            //쿠키가 존재하지 않는 경우 쿠키를 만들어준다.
            setcookie("currentCookie","$boardNumber",time()+$seconds,"/");
            $hitSql = "update currentBoard set hit = hit + 1 where number = $boardNumber";
            if($mysqli->query($hitSql) ===true){
                //쿼리문 성공
            }else{
                //쿼리문 실패
                echo "Fail to update Post hit 2";
            }
        }
        break;
    case 2:
        $boardType = 'scienceBoard';
        if(isset($_COOKIE['scienceCookie'])){
            //쿠키가 이미 생성된 경우
            $numbersText = $_COOKIE['scienceCookie'];
            $numbersList = explode(',',$numbersText);
            if(in_array($boardNumber, $numbersList) === true){
                //글리스트에 해당글이 존재 -> 조회수 증가하지 않음.
            }else{
                //글리스트에 해당글이 존재하지 않음 -> 조회수 증가.
                $hitSql = "update scienceBoard set hit = hit + 1 where number = $boardNumber";
                if($mysqli->query($hitSql) === true){
                    //쿼리문 성공
                    //리스트에 해당글을 추가하고 쿠키 수정.
                    $numbersText = $numbersText.","."$boardNumber";
                    setcookie('scienceCookie',"$numbersText",time()+$seconds,"/");
                }else{
                    //쿼리문 실패
                    echo "Fail to update Post hit 1";
                }
            }
        }else{
            //쿠키가 존재하지 않는 경우 쿠키를 만들어준다.
            setcookie("scienceCookie","$boardNumber",time()+$seconds,"/");
            $hitSql = "update scienceBoard set hit = hit + 1 where number = $boardNumber";
            if($mysqli->query($hitSql) ===true){
                //쿼리문 성공
            }else{
                //쿼리문 실패
                echo "Fail to update Post hit 2";
            }
        }
        break;
    case 3:
        $boardType = 'freeBoard';
        if(isset($_COOKIE['freeCookie'])){
            //쿠키가 이미 생성된 경우
            $numbersText = $_COOKIE['freeCookie'];
            $numbersList = explode(',',$numbersText);
            if(in_array($boardNumber, $numbersList) === true){
                //글리스트에 해당글이 존재 -> 조회수 증가하지 않음.
            }else{
                //글리스트에 해당글이 존재하지 않음 -> 조회수 증가.
                $hitSql = "update freeBoard set hit = hit + 1 where number = $boardNumber";
                if($mysqli->query($hitSql) === true){
                    //쿼리문 성공
                    //리스트에 해당글을 추가하고 쿠키 수정.
                    $numbersText = $numbersText.","."$boardNumber";
                    setcookie('freeCookie',"$numbersText",time()+$seconds,"/");
                }else{
                    //쿼리문 실패
                    echo "Fail to update Post hit 1";
                }
            }
        }else{
            //쿠키가 존재하지 않는 경우 쿠키를 만들어준다.
            setcookie("freeCookie","$boardNumber",time()+$seconds,"/");
            $hitSql = "update freeBoard set hit = hit + 1 where number = $boardNumber";
            if($mysqli->query($hitSql) ===true){
                //쿼리문 성공
            }else{
                //쿼리문 실패
                echo "Fail to update Post hit 2";
            }
        }
        break;
}

$sql = "select * from $boardType where number = '$boardNumber'";
$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

if($row != null){
    $number = $row['number'];
    $id = $row['userID'];
    $nickName = $row['userNickName'];
    $title= $row['title'];
    $content = $row['content'];
    $hit = $row['hit'];
    $date = $row['date'];
    $good = $row['good'];
}
//echo $number."<br>";
//echo $email."<br>";
//echo $nickName."<br>";
//echo $title."<br>";
//echo $content."<br>";
//echo $hit."<br>";
//echo $date."<br>";
$mysqli->close();
?>
<?php
session_start();
//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userEmail'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <link rel= "stylesheet"  href="/style.css">-->
    <!--    구글폰트-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <!--  메인 이미지 파일 -->
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
    <style>
        /*기본 메뉴 css*/
        body {
            margin: 0;
            font-family: 'Noto Sans KR', sans-serif;
            font-weight: 500;
            min-width: 1100px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        nav ul {
            display: flex;
            list-style: none;
            padding-left: 0;
        }
        nav ul li {
            font-size: 22px;
            padding: 10px 12px;
            margin-left: 70px;
            margin-right: 70px;
            white-space: nowrap;
        }
        nav ul li a {
            color: white;
            font-weight: bolder;
        }
        *        { margin:0; padding: 0; }
        .board:hover .menu-sub {
            visibility: inherit;
            pointer-events: auto;
            display: block;
        }
        .menu-sub {
            background: white;
            position: absolute;
            border: 2px solid #1b5ac2;
            transform: translate(-38px,10px);
            font-size: 10px;
            text-align: center;
            font-weight: bold;
            padding-left: 0;
            list-style: none;
            white-space: nowrap;
            display: none;
            visibility: hidden;
        }
        .menu-sub li {
            margin: 0;
            padding-left: 30px;
            padding-right: 30px;
        }
        .menu-sub li a{
            color: black;
            font-weight: bolder;
        }
        /*게시글 css*/
        .read-button {

            text-transform: uppercase;
            outline: 0;
            background: #1b5ac2;
            border: 0;
            padding: 15px 30px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .read-button:hover {
            background: darkblue;
        }
        .comment-edit {
            text-transform: uppercase;
            outline: 0;
            background: #1b5ac2;
            border: 0;
            padding: 5px 10px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            cursor: pointer;
        }
    </style>
    <script>
        //추천수를 비동기적으로 갱신하는 함수.
        function getGoodNum() {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status){
                    document.getElementById("goodNum").innerHTML = this.responseText;
                    document.getElementById("goodNum2").innerHTML = this.responseText;
                }
            };
            var boardType = '<?php echo $boardType;?>';
            var boardNumber = '<?php echo $boardNumber;?>';
            xmlHttp.open("GET", "get-goodNumber.php?boardType="+boardType+"&boardNumber="+boardNumber,true);
            xmlHttp.send();
        }

        //로그인일때 추천버튼 클릭시 함수 최종
        function goodClicked() {
            var xmlHttp = new XMLHttpRequest();
            var result; // 요청응답에 따라서 버튼색을 다르게함.
            xmlHttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200) {
                    result = this.responseText;
                }
            };

            var boardType = '<?php echo $boardType;?>';
            var boardNumber = '<?php echo $boardNumber;?>';
            xmlHttp.open("GET","goodButton-request.php?boardType="+boardType+"&boardNumber="+boardNumber,false);
            xmlHttp.send();
            if(result == '00'){
                //사용자가 추천 취소함.
                var thumb = document.getElementById('thumb-img');
                thumb.style.color = "lightgray";
            }else if (result == '01'){
                //사용자가 추천함.
                var thumb = document.getElementById('thumb-img');
                thumb.style.color = "#007bff";
            }else{
                //error
                alert("error code: "+result);
            }
            getGoodNum();
        }

        //비로그인일때 추천버튼클릭시,
        function goodClickedUnlogin() {
            alert("로그인을 하셔야 추천할 수 있습니다.");
        }
        function editComment(num) {
            var divNumber = num;
            //numSplit[0] 댓글 번호.
            //numSplit[1] 위치.
            var divNumber = String(divNumber);
            document.getElementById(divNumber).style.display = 'block';
            //alert(divNumber);

        }
        function quit(num) {
            var divNumber = num;
            var divNumber = String(divNumber);
            document.getElementById(divNumber).style.display = 'none';

        }
        function deleteComment(num) {
            if(confirm("정말 지우시겠습니까?")){
                location.href = "comment-delete.php?number="+num;
            }
        }


    </script>
    <title>시사제이</title>
</head>
<body>
<div class="home_up" style="padding-left: 70px; width: 1030px; margin-left: auto; margin-right: auto; display: flex; align-items: center;">
    <div class="home_logo" style="font-size: 50px; margin-top: 50px; margin-left: 50px">
        <i class="far fa-newspaper"  style="color: #007bff"></i>
        <a style="font-weight: bolder;" href="../index.php">시사제이</a>
    </div>
    <div style="margin-left: 60px; margin-top:45px; height: 40px; width: 500px; border: 1px solid #1b5ac2; background: #ffffff;">
        <input  style="font-size: 16px; width: 425px; padding: 10px; border: 0px; outline: none; float: left; color: #007bff" type="text" placeholder="뉴스 & 게시판 통합 검색">
        <button style="width: 50px; height: 100%; border: 0px; background: #1b5ac2; outline: none; float: right; color: #ffffff; ">검색</button>
    </div>
</div>

<div style="background-color: #1b5ac2; width: 100%;">
    <nav style="width: 1100px; display: flex;
    justify-content: space-between;margin-left: auto; margin-right: auto;
    align-items: center;margin-top: 20px; padding-left: 0px;">
        <ul>
            <li class="board"><a href="">게시판</a>
                <ul class="menu-sub">
                    <li><a href="board.php?board=1">시사</a></li>
                    <li><a href="board.php?board=2">IT/과학</a></li>
                    <li><a href="board.php?board=3">자유</a></li>
                </ul>
            </li>
            <li><a href="/jaypublic/news.php?type=1">정치</a></li>
            <li><a href="/jaypublic/news.php?type=2">경제</a></li>
            <li><a href="/jaypublic/news.php?type=3">IT/과학</a></li>
            <li><a href="/jaypublic/news.php?type=4">사회</a></li>
        </ul>
    </nav>
</div>
<div style="width: 1100px; margin-left: auto; margin-right: auto; margin-top: 30px;">
    <?php
    //게시판 분류
    switch ($_GET['board']) {
        case 1:
            ?><p style="margin-left: 25px; color: black;font-weight: bolder;font-size: 45px;">시사게시판</p>
            <?php
            break;
        case 2:
            ?><p style="margin-left: 25px; color: black;font-weight: bolder;font-size: 45px;">IT/과학게시판</p>

            <?php
            break;
        case 3:
            ?><p style="margin-left: 25px; color: black;font-weight: bolder;font-size: 45px;">자유게시판</p>
            <?php
            break;
        default:
            echo '<script>alert("잘못된 접근입니다.");location.replace(history.back());</script>';
            exit;
    }
    ?>
    <div style="margin-top: 10px; border: 1px solid #007bff; width: 100%;"></div>
    <!--    //echo $number."<br>";-->
<!--    //echo $email."<br>";-->
<!--    //echo $nickName."<br>";-->
<!--    //echo $title."<br>";-->
<!--    //echo $content."<br>";-->
<!--    //echo $hit."<br>";-->
<!--    //echo $date."<br>";-->
    <p style="margin-left: 10px; margin-top:20px; margin-bottom: 10px; font-size: 23px; font-weight: bolder;"><?php echo $title;?></p>
    <div style="margin-bottom: 20px;">
        <span style="margin-left: 10px; ">작성자 : <?php echo $nickName; ?> (<?php echo $id;?>) | <?php echo $date;?></span>

        <span style="margin-right: 10px; float: right">조회수 : <?php echo $hit;?> | 추천수 : <span id="goodNum"><?php echo $good; ?></span><span/></span>

    </div>
    <div style="margin-bottom: 70px; margin-top: 15px; border: 1px solid #007bff; width: 100%;"></div>

    <div style="width: 100%;">
        <?php echo $content; ?>
    </div>
    <div id="goodImg" style="width: 200px; margin: auto; margin-top: 170px;">
        <?php
        if($userLogin){
            $host = 'localhost:3306';
            $user = 'root';
            $password = 'void>_<void';
            $database = 'teamnova';
            $mysqli = new mysqli($host,$user,$password,$database);
            $userID = $_SESSION['userID'];
            $sql = "select * from good where userID = '$userID'and boardType ='$boardType' and boardNumber=$boardNumber";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0){
                //사용자가 추천한 글 파란색 따봉.
                ?>
                <div style="width: 100px; height: 100px; margin: auto; cursor: pointer;">
                    <i id="thumb-img" class="far fa-thumbs-up" onclick="goodClicked()" style="font-size: 100px; color: #007bff;"></i>
                </div>
        <?php
            }else {
                //사용자가 추천안한 글 회색 따봉.
                ?>
                <div style="width: 100px; height: 100px; margin: auto; cursor: pointer;">
                    <i id="thumb-img" class="far fa-thumbs-up" onclick="goodClicked()" style="font-size: 100px; color: lightgrey;"></i>
                </div>
        <?php
            }
        }else{
            echo "<div style=\"width: 100px; height: 100px; margin: auto; cursor: pointer;\">
            <i  class=\"far fa-thumbs-up\" onclick=\"goodClickedUnlogin()\" style=\"font-size: 100px; color: lightgrey;\"></i>
        </div>";
        }
        $mysqli->close();
        ?>
        <div style="width: 200px; margin: auto; margin-top: 40px;">
<!--            <p style="font-size: 50px; font-weight: bolder;">추천수</p>-->
            <p id="goodNum2" style="text-align: center; font-size: 70px; font-weight: bolder;"><?php echo $good;?></p>

        </div>
    </div>
    <script>
        getGoodImg();
    </script>
    <div style="margin-top: 70px; border: 1px solid #007bff; width: 100%;"></div>
    <?php
    $host = 'localhost:3306';
    $user = 'root';
    $password = 'void>_<void';
    $database = 'teamnova';
    // $mysqli = new mysqli($host,$user,$password,$database);
    $conn = mysqli_connect($host,$user,$password,$database);
    $sql = "select * from comment where boardType = '$boardType' and boardNumber = $boardNumber order by date";
    $result = mysqli_query($conn,$sql);
    $totalComment = mysqli_num_rows($result);
    ?>
    <div style="padding: 10px 0px; width: 100%; margin-top:30px; background: #1b5ac2;">
        <p style="margin-left: 30px; color: white; font-size: 24px; font-weight: bolder">댓글 <?php echo $totalComment;?> 개 </p>
    </div>
    <div style="margin-top: 10px;">

        <?php
        $i = 0;
        while($row = mysqli_fetch_array($result)){
            $number = $row['number'];
            $id = $row['userID'];
            $nickName = $row['userNickName'];
            $content = $row['content'];
            $date = $row['date'];

            ?>
            <div style="margin-bottom: 10px; width: 100%; border: 1px solid #007bff">
                <p style="font-size: 20px; color: black; font-weight: bolder;"><span><?php echo $nickName;?></span>(<span><?php echo $id;?></span>)
                <?php
                if($id == $_SESSION['userID']){
                    ?>
                    <button onclick="editComment(this.value)" class="comment-edit" value="<?php echo $i;?>">수정하기</button>
                    <button onclick="deleteComment(this.value)" value="<?php echo $number; ?>" class="comment-edit">삭제하기</button>
                </p>
                <?php
                }
                ?>
                <p style="font-size: 25px; color: black; font-weight: bolder;"><?php echo $content;?></p>
                <p style="font-size: 16px;"><?php echo $date;?></p>
            </div>
            <div  id="<?php echo $i;?>" style="display:none;">
                <form style="margin-bottom: 50px;" action="comment-edit.php" method="post">
                <textarea style="font-size: 16px; border: 1px solid #1b5ac2; resize: none; margin-top 10px; width: 100%; height: 200px;" placeholder="댓글 수정" name="content"><?php echo $content; ?></textarea>
                <input type="button" onclick="quit('<?php echo $i;?>')" style="float: right;" class="read-button" value="취소"/>
                <input type="submit" style="float: right;"class="read-button" value="댓글수정"/>
                <input type="hidden" name="commentNumber" value="<?php echo $number;?>">
                </form>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
    <?php
    if ($userLogin){
        //when user login
        ?>
        <div style="margin-top: 20px;">
            <div style="width: 100%; border-top: 1px solid #1b5ac2; border-left: 1px solid #1b5ac2; border-right:1px solid #1b5ac2;
             margin 20px;">
                <p style="font-size: 16px; font-weight: bolder;"><?php echo $_SESSION['userNickName'];?> (<?php echo $_SESSION['userID'];?>)</p>
            </div>
            <form action="comment-request.php" method="post">
                <textarea style="font-size: 16px; border: 1px solid #1b5ac2; resize: none; margin-top 10px; width: 100%; height: 200px;" placeholder="댓글을 입력해 주세요." name="content"></textarea>
                <input type="submit" style="float: right;"class="read-button" value="댓글작성"/>
                <input type="hidden" name="boardType" value="<?php echo $boardType;?>">
                <input type="hidden" name="boardNumber" value="<?php echo $boardNumber; ?>">
            </form>

        </div>

    <?php
    } else{
        //when user is not login
        ?>
        <div style="margin: auto; border: 1px solid gray">
            <p style="font-size: 15px; font-weight: bolder; color: gray;">댓글을 다시려면 로그인 해야 합니다.</p>
        </div>
    <?php
    }
    ?>

    <div style="margin-bottom: 20px; margin-top: 70px;">
        <button style="" class="read-button" onclick="goBack()">목록</button>
        <script>
            function goBack() {
                location.replace("board.php?board="+<?php echo $_GET['board'];?>);
            }
        </script>
        <?php
        if ($_SESSION['userID'] == $id){
            //when the post in mine
            ?>
            <button style="margin-left: 3px; float: right;" class="read-button" onclick="deletePost()">삭제</button>
            <button style="float: right;" class="read-button" onclick="modifyPost()">수정</button>
        <?php
        }else{
            //is not my post
        }
        ?>
        <script>
            function deletePost() {
                var delete_confirm = confirm("정말 글을 지우시겠습니까?");
                if(delete_confirm){
                    //alert("지웁니다.");
                    location.replace("delete-post.php?board="+<?php echo $_GET['board'];?>+"&number="+<?php echo $_GET['number'];?>);
                }else{
                    //alert("지우기 취소.");
                }
            }
            function modifyPost() {
                location.replace("modify-post.php?board="+<?php echo $_GET['board'];?>+"&number="+<?php echo $_GET['number'];?>);
            }
        </script>
    </div>

</div>
</body>
</html>

<?php
include "bottomInfo.php";
?>



