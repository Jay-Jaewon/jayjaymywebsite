
    function openDaumZipAddress() {
        new daum.Postcode({
            oncomplete:function(data) {
                jQuery("#postcode1").val(data.postcode1);
                jQuery("#postcode2").val(data.postcode2);
                jQuery("#zonecode").val(data.zonecode);
                jQuery("#address").val(data.address);
                jQuery("#address_etc").focus();
                console.log(data); //수정필
            }
        }).open();
    }
function quit_signup() {
    alert("회원가입이 취소 되었습니다.");
    history.back();
}
function id_form_check() {
    var id = document.getElementById("id").value;
    if (en_check(id) && number_check(id) && id.length >=6 && id.length <=20
        && !empty_check(id) && !special_check(id) && !kor_check(id)){
        //ok;
        return true;
    }else{
        alert("아이디 형식이 맞지 않습니다."+id);
        return false;
    }
}
function nickname_form_check() {
    var nickname = document.getElementById("nickname").value;
    if(!special_check(nickname) && !empty_check(nickname)){
        //ok
        return true;
    }else{
        alert("닉네임 형식이 맞지 않습니다.");
        return false;
    }

}

function password_check() {
    var password = document.getElementById('password').value;
    var password_confirm = document.getElementById('password_re').value;

    if(document.getElementById('password').value!==''
        && document.getElementById('password_re').value!==''){
        if(document.getElementById('password').value == document.getElementById('password_re').value){
            document.getElementById('password_check').innerHTML='비밀번호가 일치합니다.';
            document.getElementById('password_check').style.color='blue';
        }else{
            document.getElementById('password_check').innerHTML='비밀번호가 일지하지 않습니다.';
            document.getElementById('password_check').style.color='red';
        }
    }
    if(document.getElementById('password_re').value == ''){
        document.getElementById('password_check').innerHTML='';
    }
}
    function form_check1() {
        //아이디 검사--시작.
        // var str = document.getElementById("email").value;
        // if (empty_check(str)) {
        //     alert("아이디를 입력해 주세요");
        //     return false;
        // }
        var str = document.getElementById("id").value;
        if (en_check(str) && number_check(str) && str.length >=6 && str.length <=20
            && !empty_check(str) && !special_check(str) && !kor_check(str)){
            //ok;
        }else{
            // alert(str);
            alert("아이디 형식이 맞지 않습니다.");
            // alert("영어"+en_check(str) +"숫자"+number_check(str)+"빈칸"+!empty_check(str) +"특수문자"+!empty_check(str) +"한글"+ !kor_check(str));
            // alert(length);
            return false;
        }

        //비밀번호 검사
        var str = document.getElementById("password").value;
        if (empty_check(str)){
            alert("비밀번호를 입력해 주세요");
            return false;
        }

        if(str != document.getElementById("password_re").value){
            alert("비밀번호가 일치 하지 않습니다.");
            return false;
        }

        if (en_check(str) && number_check(str) && str.length >=6 && str.length <= 20
            && !empty_check(str) && !kor_check(str)){
        }else{
            alert("비밀번호 형식이 맞지 않습니다.");
            return false;
        }
        //닉네임 검사
        var str = document.getElementById("nickname")
        if(!special_check(str)){
            //ok
        }else{
            alert("닉네임에 특수문자를 사용할 수 없습니다.");
            return false;
        }


        if(!empty_check(document.getElementById("password_answer").value)
            && !empty_check(document.getElementById("nickname").value)
            && !empty_check(document.getElementById("email").value)){
        }else{
            alert("항목을 모두 채워 주세요.")
            return false;
        }
        console.log("악관전 clear");
        var conditionsAgreeResult = document.getElementById("conditions").checked;
        var infoConditionsAgreeResult = document.getElementById("infoConditions").checked;
        if(conditionsAgreeResult && infoConditionsAgreeResult){

        }else{
            alert("약관에 동의하셔야 회원가입을 하실 수 있습니다.");
            return false;
        }

        alert("회원가입!");
        return true;
    }

    function empty_check(str) {
        if(str == ''){
            return true;
        }else{
            return false;
        }
    }
    function number_check(str) {
        var pattern_num = /[0-9]/;
        if(pattern_num.test(str) == true) {
            return true;
        }else {
            return false;
        }
    }

    function special_check(str) {
        var pattern_spc = /[~!@#$%^&*()_+|\<>?:{}=/;]/;
        if(pattern_spc.test(str) == true) {
            return true;
        }else {
            return false;
        }
    }
    function en_check(str) {
        var pattern_eng = /[a-zA-Z]/;
        if(pattern_eng.test(str) == true) {
            return true;
        }else {
            return false;
        }
    }

    function kor_check(str) {
        var pattern_kor = /[ㄱ-ㅎㅏ-ㅣ가-힣]/;
        if(pattern_kor.test(str) == true) {
            return true;
        }else {
            return false;
        }
    }
    function space_check(str) {
        var blank_pattern = /[\s]/g;
        if(blank_pattern.test(str) == true){
            return false;
        }
        return true;
    }