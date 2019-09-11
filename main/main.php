<?php
    session_start();
    $user_id = $_SESSION['user_id'];

    if($user_id) { ?>
        <form action="../contents/create.php" method="post">
          <input type="submit" value="글쓰기">
        </form>
        <form action="../login/logout.php" method="post">
          <input type="submit" value="로그아웃">
        </form>
<?php
} else { ?>
        <form action="../login/login.php" method="post">
            <input type="submit" value="로그인">
        </form>
        <form action="../login/join.php" method="post">
            <input type="submit" value="회원가입">
        </form>
<?php }
