<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>로그인</title>
    <style>
      a {text-decoration: none; }
    </style>
  </head>

  <body>
    <form action="login_check.php" method="post">
      <p><input type="text" name="user_id" placeholder="아이디"></p>
      <p><input type="password" name="password" placeholder="비밀번호"</p>
      <p><input type="submit" value="로그인"</p>
    </form>
    <a href="find_id.php">아이디 </a> /
    <a href="find_pw.php">비밀번호 찾기</a>
  </body>
</html>
