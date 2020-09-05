<!doctype html>
<html lang=ko>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jay Shop Member Information</title>
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <link rel= "stylesheet"  href="../style.css">
</head>
<body>
<?php include 'menu.php' ?>
<?php
    if($userLogin){
        ?>

    <?php
    }else{
        echo '<script>alert("로그인상태가 아닙니다.");location.replace("../index.php")</script>';

    }
?>
</body>
</html>