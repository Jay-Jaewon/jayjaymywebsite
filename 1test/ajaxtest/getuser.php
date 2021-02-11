<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {text-align: left;}
    </style>
    <title>Document</title>
</head>
<body>
<?php
//$q = intval($_GET['q']);
$q = $_GET['q'];
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$mysqli = new mysqli($host,$user,$password,$database);

echo "<table>
<tr>
<th>id</th>
<th>nickname</th>
<th>email</th>
</tr>";

$sql = "select * from jayUserInfo where id = '$q'";
$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row != null){
    echo "<tr>";
    echo "<td>" . $row['id'] .  "</td>";
    echo "<td>" . $row['nickname'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($mysqli);
mysqli_free_result($result);
?>
</body>
</html>