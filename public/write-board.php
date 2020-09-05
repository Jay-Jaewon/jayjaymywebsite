<?php
session_start();
if (!isset($_SESSION['userID'])) {
    $userLogin = false;
} else {
    $userLogin = true;
}
if ($userLogin){

}else{
    echo '<script>alert("로그인을 해야 글을 작성할 수 있습니다!");</script>';
    echo '<script>history.back();</script>';
}
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel= "stylesheet"  href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script type="text/javascript" src="../summernote/lang/summernote-ko-KR.js"></script>
    <script>
        function quit_write(){
            alert("글쓰기가 취소 되었습니다.");
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
                width: 800,
                height: 650,
                minHeight: 650,
                maxHeight: null,
                focus: true,
                lang: 'ko-KR', //default : 'en-US'
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
        })
    </script>
    <title>Jay shop</title>
</head>
<body>
<?php include "menu.php"?>
<div style="width: 800px; margin-right: auto; margin-left: auto; margin-top: 20px;">
    <p style="font-size: 20px; font-weight: bolder;">글쓰기</p>
</div>
<div style="margin-top: 30px;width: 800px; margin-left: auto; margin-right: auto;">
    <form onsubmit="return writef();" action="write-board-request.php"  method="post">
        <input style="margin-bottom: 10px; width: 790px; height: 30px; border: 1px solid black;" type="text" name="title" class="board_title" placeholder="제목을 입력해 주세요.">
        <textarea id="summernote" name="contents"></textarea>
        <div style="margin-top: 50px;" align="center">
            <input type="submit" value="작성">
            <input type="button" id="btn" value="취소" onclick="quit_write()">
        </div>
    </form>
</div>




</body>
</html>
