<?php
$search = htmlspecialchars($_GET['search'],ENT_QUOTES, 'UTF-8');
include 'board.html';

echo '<p>'. $search . '에대한 검색 결과가 없습니다.</p>'
?>
