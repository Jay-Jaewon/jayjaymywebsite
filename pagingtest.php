<?php
header("content-type:text/html; charset=UTF-8");

$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);
$page = 1;
$sql = "select * from currentBoard";
$result = $mysqli->query($sql);
$totalArticleNum = $result->num_rows; // 전체글의 수

echo "전체레코드 수 : ".$totalArticleNum ."<br>";

$viewArticle = 12; //한페이지에 보여줄 글 수 12개
if(isset($_REQUEST['page'])){
    //페이지 정의됨.
    $page = intval($_REQUEST['page']);
}else{
    //$page = 1;
}
$start = ($page-1)*$viewArticle; //글을 불러오는 시작점.

$sql = "select * from currentBoard order by number desc limit $start, $viewArticle ";
$result = $mysqli->query($sql);

while($data = $result->fetch_array()){
    echo $data['number']."&nbsp; &nbsp".$data['date']."&nbsp; &nbsp".$data['title']."&nbsp; &nbsp".$data['userNickName']."<br>";

}
?>

<table border="0" width="100%" cellspacing ='0' cellpadding="0">
    <tr>
        <td width="100%" align="center">
            <?php

            echo "전체페이지 수:".ceil($totalArticleNum/$viewArticle); //전체글의 수를 한페지에 보여줄 글의 수로 나눔 = 페이지수.
            $totalPage = ceil($totalArticleNum/$viewArticle);
            echo "<br>";
            //페이지 인덱스의 시작과 종료 범위 구함//
            if($page%10){
                echo "처음 : ".$startPage =$page - $page%10 + 1;
            } else {
                echo "처음 : ".$startPage =$page - 9;
            }
            echo "<br>";
            echo "마지막 : ".$endPage = $startPage + 10;
            echo "<p>&nbsp;</p>";

            //그룹이동
            // 이전 그룹
            $prevGroup = $startPage -1;
            if($prevGroup < 1) {
                $prevGroup = 1;
            }
            // 다음 그룹
            $nextGroup = $endPage;
            if($nextGroup > $totalPage){
                $nextGroup = $totalPage;
            }

            //처음페이지 이동
            if($page != 1){
                echo "<a href='pagingtest.php?page=1'><span style='color: red; font-weight: bolder;'>처음</span></a>";
            }else{
                echo "<span style='color: red; font-weight: bolder;'>처음</span>";
            }

            // 이전 그룹 이동
            if($page != 1){
                echo "<a href='pagingtest.php?page=$prevGroup'><span>◀︎</span></a>";
            }

            for($i = $startPage; $i<$endPage; $i++){
                if($i > $totalPage){
                    break;
                }
                if($i == $page){
                    echo "<span style='margin: 0px 10px 0px 10px; color: #007bff; font-weight: bolder;'>$i &nbsp; &nbsp;</span>";
                } else {
                    echo "<a href='pagingtest.php?page=$i'><span style='margin: 0px 10px 0px 10px; color: black; font-weight: bolder;'>$i &nbsp; &nbsp;</span></a>";
                }
                //$href는 뭘까
            }

            // 다음 그룹 이동
            if($page != $totalPage){
                echo "<a href='pagingtest.php?page=$nextGroup'><span>▶︎</span></a>";
            }

            //마지막 페이지
            if($page != $totalPage){
                echo "<a href='pagingtest.php?page=$totalPage'><span style='color: red; font-weight: bolder;'>끝</span></a>";
            }
            ?>
        </td>
    </tr>
</table>
