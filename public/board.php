<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <title>Jay shop</title>
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet"  href="../style.css">
    <style>
        table {
            min-width: auto;
        }
        td:nth-child(1){ width: 100px;text-align: center;}
        td:nth-child(2){ width: 600px;}
        td:nth-child(3){ width: 170px;text-align: center;}
        td:nth-child(4){ width: 100px;text-align: center;}
        td:nth-child(5){ width: 70px;text-align: center;}

    </style>
</head>
<body>
<?php include 'menu.php' ?>

<div style="margin-left: auto; margin-right: auto; width: 1040px; margin-top: 100px; ">
    <p style="font-size: 30px; font-weight: bolder;">게시판</p>
</div>
<table>
    <tr class="table-item"><th>no</th><th>title</th><th>writer</th><th>date</th><th>hits</th></tr>
    <tr><td>3</td><td>테스트글입니다.테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>2</td><td>테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>1</td><td>테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>3</td><td>테스트글입니다.테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>2</td><td>테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>1</td><td>테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>3</td><td>테스트글입니다.테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>2</td><td>테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>1</td><td>테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>3</td><td>테스트글입니다.테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>2</td><td>테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>1</td><td>테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>3</td><td>테스트글입니다.테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>2</td><td>테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>1</td><td>테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>3</td><td>테스트글입니다.테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>2</td><td>테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>1</td><td>테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>3</td><td>테스트글입니다.테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>2</td><td>테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>1</td><td>테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>3</td><td>테스트글입니다.테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>2</td><td>테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>
    <tr><td>1</td><td>테스트글입니다.테스트글입니다.</td><td>송재원</td><td>2020.8.23</td><td>10</td></tr>


</table>
<div style="width: 1040px; margin-right: auto; margin-left: auto; margin-top: 30px;">
    <button  style="margin-left: 0px;width:100px; height: 30px;float: right; padding 4px;font-size: 17px;background-color: lavender; border: 1px solid black;" class="write-board"
             onclick="window.location.href='write-board.php'">글쓰기</button>

</div>


<form action="board.php" method="get">
    <div class="search-board" style="width: 400px;
    padding-top: 40px;
    padding-left: 100px;
    margin-right: auto;
    margin-left: auto;">
        <select style="height: 30px;">
            <option value=''>제목</option>
            <option value=''>내용</option>
            <option value=''>글쓴이</option>
        </select>
        <input style="height: 24px;" type="text" placeholder="검색어를 입력해주세요." name="search">
        <input style="width: 80px; height: 30px; background-color: lavender; border: 1px solid black;"
               type="submit" value="검색">
    </div>
</form>
<div style="height: 130px;">

</div>
<?php include 'bottom.php'?>
</body>
</html>


<!--<table border="5">-->
<!--    <th>테이블</th>-->
<!--    <th>만들기</th>-->
<!--    <tr> -->
<!--        <td>첫번째 칸</td>-->
<!--        <td>두번째 칸</td>-->
<!--    </tr> -->
<!--    <tr> -->
<!--        <td>첫번째 칸</td>-->
<!--        <td>첫번째 칸</td>-->
<!--    </tr> -->
<!--</table>-->

<!--<table class="table table-hover">-->
<!--    <thead>-->
<!--    <tr>-->
<!--        <th>no</th>-->
<!--        <th>제목</th>-->
<!--        <th>작성d자</th>-->
<!--        <th>날짜</th>-->
<!--        <th>조회수</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    <tr>-->
<!--        <td>1</td>-->
<!--        <td>첫.</td>-->
<!--        <td>송재원</td>-->
<!--        <td>2020.08.11</td>-->
<!--        <td>4</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>1</td>-->
<!--        <td>첫 게</td>-->
<!--        <td>송재원ddddddd</td>-->
<!--        <td>2020.08.11</td>-->
<!--        <td>4</td>-->
<!--    </tr>-->
<!--    </tbody>-->
<!--</table>-->
<!--<hr/>-->
<!--<div class="text-center">-->
<!--    <ul class="pagination">-->
<!--        <li><a href="#">1</a></li>-->
<!--        <li><a href="#">2</a></li>-->
<!--        <li><a href="#">3</a></li>-->
<!--        <li><a href="#">4</a></li>-->
<!--        <li><a href="#">5</a></li>-->
<!--        <li><a href="#">6</a></li>-->
<!--    </ul>-->
<!--</div>-->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
