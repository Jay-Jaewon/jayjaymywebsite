<?php
$name = $_GET['name'];
echo '<p>' . $name . '님, 홈페이지 방문을 환영합니다.</p>';
$name = $_GET['name'];
echo '<p>' . htmlspecialchars($name, ENT_QUOTES,'UTF-8') . '님, 홈페이지 방문을 환영합니다.';
//하지만 보안을 위해서 아래와 같이한다. 사용자가 url를 조작할 수 있으므로

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
echo '<p>' . htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8')
. ' ' . htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8')
. '님, 홈페이지 방문을 환영합니다.</p>';
?>