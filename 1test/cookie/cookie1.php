<?php
class Jayexample{
    /**
     * Jayexample constructor.
     */
    public $me;
    public $name;
    public $age;

    public static function objectConvert($ob){
        $new = new Jayexample($ob->me);
        return $new;
    }
    public function __construct($str)
    {
        $this->me = $str;
        $this->age = "24";
        $this->name ="JAY";
    }

    function showAll(){
        echo "<br/> showAll() <br/>";
        echo $this->name."<br/>";
        echo $this->age."<br/>";
        echo $this->me."<br/>";
        echo "end<br/>";
    }
}
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_COOKIE['jayCookie'])){
        echo "쿠키가 생성 되었습니다.<br/>";
        echo $_COOKIE['jayCookie'];
    }else{
        echo "쿠키 생성되지 않았습니다.<br/>";
    }

    if(isset($_COOKIE['jayyCookie'])){
        echo "배열쿠키가 생성 되었습니다. <br/>";
        $val = unserialize($_COOKIE['jayyCookie']);
        echo $_COOKIE['jayyCookie']."<br/>";
        print_r($val);
        echo $val[0]."<br/>";
        echo $val[1]."<br/>";
        echo $val[2]."<br/>";

    }else{
        echo "배열쿠키 생성되지 않았습니다.<br/>";
    }
    if(isset($_COOKIE['jayyyCookie'])){
        echo "json쿠키가 생성 되었습니다. <br/>";
        echo $_COOKIE['jayyyCookie']."<br/>";
//        $jsonVar = $_COOKIE["jayyyCookie"];
//        $jayClass = json_decode($jsonVar);
//        echo $jayClass;
//        $newJayClass = Jayexamle::objectConvert($jayClass);
//
//        $newJayClass->showAll();
//        print_r($newJayClass);
        $serVar = $_COOKIE["jayyyCookie"];
        $var = unserialize($serVar);
        $var->showAll();


    }else{
        echo "json쿠키 생성되지 않았습니다.<br/>";
    }
    ?>
<form method="post" action="cookie.php">
    <input type="submit" value="쿠키생성"/>
    <input type="text" name="text" placeholder="텍스트 입력"/>
    <input type="checkbox" name="yn"><span>쿠키생성</span>
    <br>
    <input type="checkbox" name="delete"><span>쿠키삭제</span>
</form>
</body>
</html>
