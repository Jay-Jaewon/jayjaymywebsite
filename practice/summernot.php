<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>without bootstrap</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="lang/summernote-ko-KR.js"></script>
    <script type="text/javascript" src="../summernote/lang/summernote-ko-KR.js"></script>
    <script>
        var writef = function() {
            var markip = $('#summernote').summernote('code');
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
</head>
<body>
<div style="width: 800px; margin-left: auto; margin-right: auto;">
    <form method="post" onsubmit="return writef();" action="write.php">
        <input style="margin-bottom: 10px; width: 800px; height: 30px; border: 1px solid black;" type="text" name="title" class="board_title" placeholder="제목을 입력해 주세요.">
        <textarea id="summernote" name="contents"></textarea>
    </form>
    <div align="center">
        <input type="submit" value="작성">
        <input type="button" id="btn" value="취소">
    </div>
</div>



</body>
</html>
