<?php
//클래스는 콜바이 레퍼런스. 클래스 수정시 이전의 클래스도 영향받음.
class HitManager{
    //게시판별로 배열 선언
    public $current; //type 1
    public $science; //type 2
    public $free; //type 3

    function __construct()
    {
       $this->science = array();
       $this->current = array();
       $this->free = array();
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
    function showAll(){
        print_r($this->current);
        echo "<br/>";
        print_r($this->science);
        echo "<br/>";
        print_r($this->free);
        echo "<br/>";
    }

    //리스트에서 조회한 글을 검색하는 함수. 타입과 번호를 입력하면 해당 글을 조회하였는지 true false 로 반환함.
    //입력값이 잘 못된 경우도 false 로 반환함.
    function checkHit($type, $num){
        switch ($type){
            case 1:
                //시사조회수검색.
                if(in_array($num,$this->current)){
                    return true;
                }else{
                    return false;
                }
                break;
            case 2:
                //과학조회수검색.
                if(in_array($num,$this->science)){
                    return true;
                }else{
                    return false;
                }
                break;
            case 3:
                //자유조회검색.
                if(in_array($num,$this->free)){
                    return true;
                }else{
                    return false;
                }
                break;
            default:
                return false;
        }
    }

    //리스트에 조회한 글을 추가하는 함수.
    function pushHit($type, $num){
        //type 0 시사, 1 science, 2 자유 게시판 분류
        switch ($type){
            case 0:
                //시사조회수.
                array_push($this->current,$num);
                break;
            case 1:
                //과학조회수.
                array_push($this->science,$num);
                break;
            case 2:
                array_push($this->free,$num);
                break;
            default:
                return false;
        }
        return true;
    }
}



?>