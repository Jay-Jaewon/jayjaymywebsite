<?php
//echo "1 :".$var[0]."2 : ".$var[1]."3 : ".$var[2];
class Jayexample{
    /**
     * Jayexample constructor.
     */
    public $me;
    public $name;
    public $age;

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
echo $_POST['text'];
if (isset($_POST['yn'])){
    // 쿠키 생성.
    setcookie("jayCookie","$_POST[text]",time()+3600*24,"/");

    $var = array("a","b","c");
    $varStr = serialize($var);
    if (!isset($_COOKIE["jayyCookie"])){
        setcookie("jayyCookie",$varStr,time()+3600*24,"/");
    }
    if (!isset($_COOKIE["jayyyCookie"])){
        $ex = new Jayexample($_POST[text]);
       // $json_ex = json_encode($ex);
//        setcookie("jayyyCookie",$json_ex,time()+3600*24,"/");
        $serEx = serialize($ex);
        setcookie("jayyyCookie",$serEx,time()+3600*24,"/");

    }
}else{
    echo "생성되지 않음";
}
if (isset($_POST['delete'])){
    setcookie("jayCookie","",time()-3600,"/");
    setcookie("jayyCookie","",time()-3600*24,"/");
    setcookie("jayyyCookie","",time()-3600*24,"/");

}
echo '<script>location.replace("cookie1.php");</script>';
?>