<?php
session_start();
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
if ($userLogin){
}else{
    echo '<script>alert("로그인을 해야 글을 수할 수 있습니다!");</script>';
    echo '<script>history.back();</script>';
}
//echo $_SESSION['userID'];
//echo $_GET['board'];
//echo $_GET['number'];

//necessary variables
$id = $_SESSION['userID'];
$number = $_GET['number'];

switch ($_GET['board']){
    case 1: $boardType = 'currentBoard'; break;
    case 2: $boardType = 'scienceBoard'; break;
    case 3: $boardType = 'freeBoard'; break;
}

//db variables
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
//데이터베이스 연결
$db_conn = @mysqli_connect($host,$user,$password,$database);

if(!$db_conn) {
    $error = mysqli_connect_error();
    $errno = mysqli_connect_errno();
    print "$errno: $error\n";
    echo "$errno: $error<br />";
}else{
    //db connection success
//    print "db연결 성공";
//    echo "db연결 성공";
}
$query = "select * from $boardType where number = '$number' and userID = '$id'";
//echo $query;
$result = mysqli_query($db_conn, $query);
if( $result ){
    //query success
    if($row = mysqli_fetch_assoc($result)){
        $board['number'] = $row['number'];
        $board['userID'] = $row['userID'];
        $board['userNickName'] = $row['userNickName'];
        $board['title'] = $row['title'];
        $board['content'] = $row['content'];
        $board['hit'] = $row['hit'];
        $board['likes'] = $row['likes'];
        $board['dislikes'] = $row['dislikes'];
    }
}else{
    //query fail
    echo "Error: : ".mysqli_error($db_conn);
}
//echo "<script>location.replace(history.back());</script>";
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
        /*게시판 css*/
        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            min-width: auto;
        }
        .table-item {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            font-size: 17px;
        }
        td {
            border-bottom: 1px solid gray;
            font-size: 16px;
        }
        tr:nth-child(2n) {
            background: #E5F3FB;
        }
        th {
            text-align: center;
        }
        td:nth-child(1){ width: 100px;text-align: center;}
        td:nth-child(2){ width: 600px;}
        td:nth-child(3){ width: 170px;text-align: center;}
        td:nth-child(4){ width: 100px;text-align: center;}
        td:nth-child(5){ width: 70px;text-align: center;}
        .board-button {

            text-transform: uppercase;
            outline: 0;
            background: #1b5ac2;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .board-button:hover,.board-button:active,.board-button:focus {
            background: darkblue;
        }
        .write-button {
            outline: 0; border: 0; color: white; background: #007bff; padding: 10px; margin: 10px;
        }
    </style>
    <!--    썸머노트 에디터 자바스크립트-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script type="text/javascript" src="../summernote/lang/summernote-ko-KR.js"></script>
    <script type="text/javascript">
        function quit_modify(){
            alert("글수정이 취소 되었습니다.");
            history.back();
        }
        function writef() {
            var markup = $('#summernote').summernote('code');
            return markup;
        }
        $(document).ready(function () {
            $('#summernote').summernote({
                placeholder: '내용을 작성할 수 있습니다.',
                tabsize: 2,
                width: 1100,
                height: 650,
                minHeight: 650,
                maxHeight: null,
                focus: true,
                lang: 'ko-KR', //default : 'en-US'
                // callbacks:{
                //     onImageUpload : function (files, editor,welEditable ) {
                //         console.log('image upload:',files);
                //         sendFile(files[0],editor,welEditable);
                //     },
                // },
                toolbar: [
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['style', ['bold', 'italic', 'underline','strikethrough', 'clear']],
                    ['color', ['forecolor','color']],
                    ['table', ['table']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert',['picture','link','video']],
                    ['view', ['fullscreen', 'help']]
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New','맑은 고딕','궁서','굴림체','굴림','돋음체','바탕체'],
                fontSizes: ['8','9','10','11','12','14','16','18','20','22','24','28','30','36','50','72']
            });

            // function sendFile(file,editor,welEditable) {
            //     data = new FormData();
            //     data.append("file",file);
            //     $.ajax({
            //         url: "saveimage.php", //이미지 저장 소스
            //         data: data,
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         type: 'POST',
            //         success: function (data) {
            //             var image = $('<img>').attr('src',''+data); // 에디터에 img 태그로 저장하기 위함
            //             $('.summernote').summernote("insertNode", image[0]); //summernote 에디터에 이미 태그를 보여줌
            //         },
            //         error: function (jpXHR, textStatus, errorThrown) {
            //             console.log(textStatus+""+errorThrown);
            //         }
            //     });
            // }
            // $('form').on('submit',function (e) {
            //     e.preventDefault();
            // });
        });
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
    <div style="width: 1100px; margin-left: auto; margin-right: auto; margin-top: 30px;">
        <p id="board-title" style="margin-left: 25px; color: black;font-weight: bolder;font-size: 27px;"></p>
        <script type="text/javascript">
            var boardType = <?php echo $_GET[board]?>;
            <?php
            switch ($_GET[board]){
                case 1: $_SESSION['boardType'] = 'currentBoard'; break;
                case 2: $_SESSION['boardType'] = 'scienceBoard'; break;
                case 3: $_SESSION['boardType'] = 'freeBoard'; break;
                default: $_SESSION['boardType'] = 'freeBoard';
                //TODO : 예외처리 일단 필요없을 것같아서 안해줌.
            }
            ?>

            var title = document.getElementById('board-title');
            switch (boardType) {
                case 1:
                    title.innerText = "시사게시판 글수정하기";
                    break;
                case 2:
                    document.getElementById('board-title').innerHTML = "IT/과학게시판 글수정하기";
                    break;
                case 3:
                    title.innerHTML = "자유게시판 글수정하기";
                    break;
                default:
                    alert("잘못된 접근입니다.");
                    location.replace("../index.php");
            }
        </script>
        <div style="margin-top: 10px; border: 1px solid #007bff; width: 100%;"></div>
        <div style="margin-top: 30px;width: 1100px; margin-left: auto; margin-right: auto;">
            <form onsubmit="return writef();" action="modify-post-request.php"  method="post">
                <input style="margin-bottom: 10px; width: 1100px; height: 30px; border: 1px solid black;" value="<?php echo $board['title'];?>"
                       type="text" name="title" class="board_title" placeholder="제목을 입력해 주세요." maxlength="100";>
                <textarea id="summernote" name="contents"><?php echo $board['content']; ?></textarea>
                <input type="hidden" name="number" value="<?php echo $board['number']; ?>">
                <div style="margin-top: 50px;" align="center">
                    <input type="submit" class="write-button" value="수정">
                    <!--                    <input type="hidden" name="boardType" id="boardType">-->
                    <input type="button" class="write-button" value="취소" onclick="quit_modify()">
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>

<?php
include "bottomInfo.php";
?>