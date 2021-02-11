<?php
session_start();
//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
if(($_SESSION['state']) == "userInfo"){
    //ok
    //unset($_SESSION['state']);
    //보안상 이런것들이 필요한 것 같다.
}else{
    //비정상적인 접근
    echo '<script>alert("비정상적인 접근 입니다."); location.replace("/index.php");</script>';
    exit;
}
//db connect
$host = 'localhost:3306';
$user = 'root';
$password = 'void>_<void';
$database = 'teamnova';
$conn = mysqli_connect($host,$user,$password,$database);
if (!$conn){
    $error = mysqli_connect_error();
    $errno = mysqli_connect_errno();
    print "errno: $error\n";
    exit();
}else{
    //connect success
}
$id = $_SESSION['userID'];
$query = "select * from jayUserInfo where id = '$id'";
$result = mysqli_query($conn,$query);
if($result){
    //query success
    $row = mysqli_fetch_assoc($result);
    $id = $row["id"];
    $password = $row["password"];
    $email = $row["email"];
    $answer = $row["answer"];
    $nickname = $row["nickname"];
    $receive = $row["receive"];
    mysqli_free_result($result);
}else{
    //query fail
    echo "Error : ".mysqli_error($conn);
}

?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <link rel= "stylesheet"  href="/style.css">-->
    <!--    구글폰트-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <!--  메인 이미지 파일 -->
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
    <style>
        /*기본 메뉴 css*/
        body {
            margin: 0;
            font-family: 'Noto Sans KR', sans-serif;
            font-weight: 500;
            min-width: 1100px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        nav ul {
            display: flex;
            list-style: none;
            padding-left: 0;
        }
        nav ul li {
            font-size: 22px;
            padding: 10px 12px;
            margin-left: 70px;
            margin-right: 70px;
            white-space: nowrap;
        }
        nav ul li a {
            color: white;
            font-weight: bolder;
        }
        *        { margin:0; padding: 0; }
        .board:hover .menu-sub {
            visibility: inherit;
            pointer-events: auto;
            display: block;
        }
        .menu-sub {
            background: white;
            position: absolute;
            border: 2px solid #1b5ac2;
            transform: translate(-38px,10px);
            font-size: 10px;
            text-align: center;
            font-weight: bold;
            padding-left: 0;
            list-style: none;
            white-space: nowrap;
            display: none;
            visibility: hidden;
        }
        .menu-sub li {
            margin: 0;
            padding-left: 30px;
            padding-right: 30px;
        }
        .menu-sub li a{
            color: black;
            font-weight: bolder;
        }
        /*버튼 css*/

        .this-button {
            text-transform: uppercase;
            outline: 0;
            background: #1b5ac2;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .this-button:hover,.this-button:active,.this-button:focus {
            background: darkblue;
        }
    </style>
    <title>시사제이</title>
</head>
<body>
<script type="text/javascript" src="signup2.js"></script>
<script>
    function quit() {
        location.replace("/index.php");
    }
    function nickname_check() {
        if(nickname_form_check()){
            //ok
        }else{
            return false;
        }
        var nickname = document.getElementById('nickname').value;

        var form = document.createElement("form");
        form.setAttribute("charset", "UTF-8");
        form.setAttribute("method", "Post"); // Get 또는 Post 입력
        form.setAttribute("action", "checkinfo.php");

        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "userNickName");
        hiddenField.setAttribute("value", nickname);
        form.appendChild(hiddenField);

        //checkinfo.php에 요청을 보낼때 어떤요청인지 정해서 보냄.
        var requestType = document.createElement("input");
        var type = 'nickname_check';
        requestType.setAttribute("type","hidden");
        requestType.setAttribute("name","requestType");
        requestType.setAttribute("value", type);
        form.appendChild(requestType);

        var url ="checkinfo.php";
        var title = "시사제이";
        var status = "toolbar=no,directories=no,scrollbars=no,resizable=yes,status=no,menubar=no,width=650, height=600, top=0,left=20";
        window.open("checkinfo.php", title,status); //팝업 창으로 띄우기. 원치 않으면 주석.
        form.target = title;
        document.body.appendChild(form);
        form.submit();
    }

    function form_check() {
        var nickname = document.getElementById("nickname").value;
        if(!special_check(nickname) && !empty_check(nickname)){
            //ok
        }else{
            alert("닉네임 형식이 맞지 않습니다.");
            return false;
        }
        if(!empty_check(document.getElementById("password_answer").value)
            && !empty_check(document.getElementById("nickname").value)
            && !empty_check(document.getElementById("email").value)){
        }else{
            alert("항목을 모두 채워 주세요.")
            return false;
        }
        return true;
    }
    
    function goWithdraw() {
        if(confirm("정말로 회원탈퇴 하시겠습니까?")){
            location.replace("withdraw.php");
        }else{
            return;
        }

    }
    function goChangePW() {
        location.replace("change-pw.php");
    }
</script>
<div class="home_up" style="padding-left: 70px; width: 1030px; margin-left: auto; margin-right: auto; display: flex; align-items: center;">
    <div class="home_logo" style="font-size: 50px; margin-top: 50px; margin-left: 50px">
        <i class="far fa-newspaper"  style="color: #007bff"></i>
        <a style="font-weight: bolder;" href="../index.php">시사제이</a>
    </div>
    <div style="margin-left: 60px; margin-top:45px; height: 40px; width: 500px; border: 1px solid #1b5ac2; background: #ffffff;">
        <input  style="font-size: 16px; width: 425px; padding: 10px; border: 0px; outline: none; float: left; color: #007bff" type="text" placeholder="뉴스 & 게시판 통합 검색">
        <button style="width: 50px; height: 100%; border: 0px; background: #1b5ac2; outline: none; float: right; color: #ffffff; ">검색</button>
    </div>
</div>
<div style="background-color: #1b5ac2; width: 100%;">
    <nav style="width: 1100px; display: flex;
    justify-content: space-between;margin-left: auto; margin-right: auto;
    align-items: center;margin-top: 20px; padding-left: 0px;">
        <ul>
            <li class="board"><a href="">게시판</a>
                <ul class="menu-sub">
                    <li><a href="board.php?board=1">시사</a></li>
                    <li><a href="board.php?board=2">IT/과학</a></li>
                    <li><a href="board.php?board=3">자유</a></li>
                </ul>
            </li>
            <li><a href="/jaypublic/news.php?type=1">정치</a></li>
            <li><a href="/jaypublic/news.php?type=2">경제</a></li>
            <li><a href="/jaypublic/news.php?type=3">IT/과학</a></li>
            <li><a href="/jaypublic/news.php?type=4">사회</a></li>
        </ul>
    </nav>
</div>
<div style="width: 1100px; margin: auto;">
    <p style="margin-bottom: 50px; margin-top: 50px; font-size: 35px; font-weight: bolder; text-align: center;">회원정보 수정</p>
    <form action="userInfo-request.php" onsubmit="return form_check()" method="post">

        <table width="940px;" style="padding:5px 0 5px 0; margin: auto;">
            <tr height="2px"  bgcolor="#007bff"><td colspan="2"></td></tr>
            <tr>
                <th>아이디</th>
                <td>
                    <input type="text" disabled value="<?php echo $id; ?>" name="userID" id="id" maxlength="20">
                </td>
            </tr>

            <tr>
                <th>질문답변 힌트</th>
                <td><select name='pwhint' size='1' class='select'>
                        <option value=''>선택하세요</option>
                        <option value='30'>졸업한 초등학교 이름은?</option>
                        <option value='31'>제일 친한 친구의 핸드폰 번호는?</option>
                        <option value='32'>아버지 성함은?</option>
                        <option value='33'>어머니 성함은?</option>
                        <option value='34'>어릴 적 내 별명은?</option>
                        <option value='35'>가장 아끼는 물건은?</option>
                        <option value='36'>좋아하는 동물은?</option>
                        <option value='37'>좋아하는 색깔은?</option>
                        <option value='38'>좋아하는 음식은?</option>
                    </select>
            </tr>
            <tr>
                </td>
                <th>질문답변 답</th>
                <td><input type='text' value="<?php echo $answer; ?>" name='userPWAnswer' id="password_answer" maxlength="20"></td>
            </tr>
            <tr>
                <th>*</th>
                <td><p>질문 답변내용은 아이디/비밀번호 찾기시 사용되므로 신중하게 입력해주시길 바랍니다.</p></td>
            </tr>
            <tr>
                <th>닉네임</th>
                <td>
                    <input type="text" name="userNickName" value="<?php echo $nickname;?>" id="nickname" maxlength="20"/>
                    <input type="button" style="background: #007bff;color: white; margin-left: 10px; padding: 5px;" onclick="nickname_check()" value="중복체크"/>
                </td>
            </tr>
            <tr>
                <th>*</th>
                <td><p>닉네임은 사이트 이용시 다른 사용자에게 표시되는 이름입니다. 특수문자를 사용할 수 없습니다.</p></td>
            </tr>

            <tr>
                <th>이메일</th>
                <td>
                    <input type="email" name="userEmail" value="<?php echo $email; ?>" id="email" maxlength="40">
                </td>
            </tr>
            <tr>
                <th>추가 정보 수신</th>
                <td class="s">
                    <?php
                    if($receive == "yes"){
                        ?>
                        <input type="radio" name="userReceive" value="yes" checked> 수신
                        <input type="radio" name="userReceive" value="no"> 수신거부
                    <?php
                    }else{
                        ?>
                        <input type="radio" name="userReceive" value="yes" > 수신
                        <input type="radio" name="userReceive" value="no" checked> 수신거부
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <tr height="2px"  bgcolor="#007bff"><td colspan="2"></td></tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="수정" style=" outline: 0; border: 0; color: white; background: #007bff; padding: 10px; margin: 10px; ">
                    <input type="reset" value="취소" onclick="quit()" style="outline: 0; border: 0; color: white; background: #007bff; padding: 10px; margin: 10px;">
                </td>
            </tr>
        </table>
    </form>
    <div style="width: 940px; margin: auto;">
        <button class="this-button" style="float: right;" onclick="goWithdraw()">회원탈퇴</button>
        <button class="this-button" style="float: right; margin-right: 30px;" onclick="goChangePW()">비밀번호 변경하기</button>
    </div>



</div>


</body>
</html>
<?php
mysqli_close($conn);
?>
<?php
include "bottomInfo.php";
?>



