<?php
    session_start();
    $user_id=$_SESSION['user_id'];

    if(isset($user_id)) { ?>
        <form action="../contents/create.php" method="post">
          <input type="submit" value="글쓰기">
        </form>
        <form action="../login/logout.php" method="post">
          <input type="submit" value="로그아웃">
        </form>
        <p><a href="../login/pw_change.php">비밀번호 변경</a></p>
    <?php
    } else { ?>
        <form action="../login/login.php" method="post">
            <input type="submit" value="로그인">
        </form>
        <form action="../login/join.php" method="post">
            <input type="submit" value="회원가입">
        </form>
        <p><a href="../login/find_id.php">아이디</a> /
        <a href="../login/find_pw.php">비밀번호 찾기</a></p>
<?php }
