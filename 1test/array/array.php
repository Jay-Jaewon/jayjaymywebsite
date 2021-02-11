<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

if(isset($_POST['makeCookie'])){
    $val1 = array();
    $val2 = array(1,2,3,4);
    $serVal1 = serialize($val1);
    $serVal2 = serialize($val2);

    setcookie("testCookie1","$serVal1",time()+600,"/");
    setcookie("testCookie2","$serVal2",time()+600,"/");
}

if(isset($_POST['pushCookie'])){
    $val1 = unserialize($_COOKIE['testCookie1']);
    $val2 = unserialize($_COOKIE['testCookie2']);

    $pushNumber = $_POST['pushNumber'];

    array_push($val1, $pushNumber);
    array_push($val2, $pushNumber);


    $serVal1 = serialize($val1);
    $serVal2 = serialize($val2);
    setcookie("testCookie1","$serVal1",time()+600,"/");
    setcookie("testCookie2","$serVal2",time()+600,"/");

}

if(isset($_POST['test3'])){

    //안됨 오류. setcookie를 하고 나서 바로 하면 안된다.
//    $val1 = array();
//    $serVal1 = serialize($val1);
//    setcookie('testCookie3',"$serVal1",time()+600,"/");
//    $cookieVal3 = $_COOKIE['testCookie3'];
//    $list3 = unserialize($cookieVal3);
//    print_r($list3);
    $val1 = array();
    $serVal1 = serialize($val1);
    setcookie('testCookie3',"$serVal1",time()+600,"/");
    $_COOKIE['testCookie3'] = $serVal1;
    //이렇게 사용할 수 없음.
    print_r($_COOKIE['testCookie3']);
}


//echo '<script>location.replace("array1.php");</script>';

?>