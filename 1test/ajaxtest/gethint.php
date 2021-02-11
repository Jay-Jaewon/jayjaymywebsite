<?php
//the php file checks an array of names, and returns the corresponding name(s) to the browser :

//Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

//get the q parameter fron url
$q = $_REQUEST['q'];

$hint = "";

// lookup all hints from array if $q is different from ""
// 내가 작성한 글이 공백이 아닐때
if ($q !== "") {
    //소문자로 바꿈.
    $q = strtolower($q);
    //문자의 길이를 구함.
    $len = strlen($q);
    //이름 배열 요소 마다,
    foreach ($a as $name){
        //내가 작성할 문자열에서, 내가 작성할 문자열의 길이만큼 배열요소(이름)의 한부분이 있는제 검사
        if (stristr($q, substr($name, 0, $len))){
            //위의 stristr은 만약 이름요소의 한 부분이 내 문자열에 존재한다면 그 문자열을출력하고
            //존재하지 않다면 false를 반환함.
            if ($hint === "") {
                $hint = $name;
            } else{
                $hint .= ", $name";
            }
        }
    }
}
//코드를 한줄한줄보니까 새롭고 재밌고 좋다.
//Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;

?>

