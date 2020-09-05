<?php
session_start();
//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}

?>
<nav class="navbar">
    <ul class="navbar_menu">
        <li class="menu_item">
            <a href="">Notice</a>
        </li>
        <li><a href="">News</a></li>
        <li><a href="">Products</a>
            <ul class="menu-sub">
                <li><a href="products.php">전체</a></li>
                <li><a href="">상의</a></li>
                <li><a href="">하의</a></li>
                <li><a href="">신발</a></li>
                <li><a href="">악세사리</a></li>
            </ul>
        </li>

    </ul>

    <div class="navbar_logo">
        <a href="../index.php"><i class="fas fa-hat-cowboy"></i>
        </a>
        <a href="../index.php">JAY</a>
    </div>

    <ul class="navbar_menu">
        <li class="menu_item"><a href="index.php">Home</a></li>
        <li class="menu_item"><a href="">Account</a>
            <ul class="menu-sub">
                <?php
                if ($userLogin){
                    ?>
                    <li><a href="logout.php" id="log">로그아웃</a></li>
                    <?php
                }else{
                    ?>
                    <li><a href="login.php" id="log">로그인</a></li>
                    <?php
                }
                ?>
                <li><a href="signup.php">회원가입</a></li>
                <li><a href="">장바구니</a></li>
                <li><a href="">찜목록</a></li>
                <li><a href="member-info.php">회원정보</a></li>
                <li><a href="">주문목록</a></li>
            </ul>
        </li>
        <li class="menu_item"><a href="">Community</a>
            <ul class="menu-sub">
                <li><a href="board.php">자유게시판</a></li>
                <li><a href="">상품후기</a></li>
                <li><a href="">Q/A 고객센터</a></li>

            </ul>
        </li>
    </ul>
</nav>
<p style="font-weight: bolder; background-color: beige; margin: 0;text-align: end;">
    <?php
    if($userLogin){
        ?>
        <?php echo $_SESSION['userName']?> 님 반갑습니다.
        <?php
    }else{
        ?> 로그인이 되어있지 않습니다.
        <?php
    }?>
</p>