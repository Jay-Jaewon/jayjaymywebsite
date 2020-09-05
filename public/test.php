


<html>
<head>
    <script>
        // var str = document.getElementById("123").value;
        // var pattern_eng = /[a-zA-Z]/;
        // var str1 = document.getElementById("usr_ID");
        // alert(str + "입니다.");
        // if(pattern_eng.test(str) == true) {
        //     alert("true")
        // }else {
        //     alert("false");
        // }
        // alert("로그인 되었습니다.");
       // location.replace("../index.php");

        function test() {
            var str1 = document.getElementById("1").value;
            var str2 = document.getElementById("2").value;
            var str3 = "";

            if(str1 != str2){
                str3 = "일지하지 않습니다.";
            }else{
                str3 = "일치합니다.";
            }
            alert(str1 + "입니다." +str2+ "입니다."  + str3);
            return false;
        }
    </script>
</head>
<div>
    <form action="#" onsubmit="return test()">
        <input type="text" id="1" value=""/>
        <input type="text" id="2" value=""/>
        <input type="submit" value="테스트">
    </form>

</div>
</html>
