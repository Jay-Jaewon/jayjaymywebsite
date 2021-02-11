<?php
//클래스는 콜바이 레퍼런스. 클래스 수정시 이전의 클래스도 영향받음.
class Read {
    public $type;
    public $number;
    public $time;
    private $userID;

    function __construct($type, $number, $userID)
    {
        $this->number = $number;
        $this->type = $type;
        $this->userID = $userID;
        $this->time = date("Y-m-d H:i:s");
    }
    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }
    function print_all(){
        print_r($this);
        echo "<br/>";
    }

}
$data1 = new Read(1,34,"teamnova1");
$data2 = new Read(1,34,"teamnova2");

$dataSet = array();
echo "테스트 <br/>";

array_push($dataSet,$data1);
array_push($dataSet,$data2);
$dateStr = serialize($dataSet);
$result = unserialize($dateStr);
echo "result: 출력 <br/>";
print_r($result);
echo "<br/>시간차이 출력 <br/>";

date_default_timezone_set('Asia/Seoul');
//기준시간
$time1 = date("Y-m-d")." 23:59:59";
echo "기준시간 : ".$time1."<br/>";
//현재시간
$time2 = date("Y-m-d H:i:s");
echo "현재시간 : ".$time2."<br/>";
//시간차이
$timeGap = strtotime($time1)-strtotime($time2);


echo "시간차이 : ".ceil($timeGap/(60*60))."<br/>";
echo "분차이 : ".ceil($timeGap/(60))."<br/>";
echo "초차이 : ".ceil($timeGap)."<br/>";

//foreach ($dataSet as $val){
//    $val->type = 3;
//    $val->print_all();
//}
//echo "테스트 <br/>";
//$data1->print_all();
//$data2->print_all();
echo "<br/><br/>테스트";
$a = array();
array_push($a,1);
array_push($a,2);
array_push($a,3);
array_push($a,4);
print_r($a);
if(in_array(1,$a)){
    echo "1이 존재합니다.<br/>";
}else{
    echo "1이 없습니다.<br/>";

}

if(in_array(5,$a)){
    echo "5이 존재합니다.<br/>";
}else{
    echo "5이 없습니다.<br/>";

}
include_once ('jaypublic/hitsClasses.php');
$hitManager = new HitManager();
$hitManager->pushHit(1,1);
$hitManager->pushHit(1,2);
$hitManager->pushHit(1,3);
$hitManager->pushHit(1,4);
$hitManager->pushHit(2,1);
$hitManager->pushHit(2,2);
$hitManager->pushHit(2,3);
$hitManager->pushHit(2,4);

$hitManager->showAll();
$varStr = serialize($hitManager);
echo "<br/> $varStr <br/>";
$var = unserialize($varStr);
$var->showAll();
?>