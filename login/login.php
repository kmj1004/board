<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>로그인</title>
    <style>
      form { display: inline; }
      body { margin-top:150px;
        text-align: center; }
    </style>
  </head>
  <body>
    <h2>로그인</h2>
    <form action="login_check.php" method="post">
      <p><input type="text" name="user_id" placeholder="아이디"></p>
      <p><input type="password" name="password" placeholder="비밀번호"></p>
      <input type="submit" value="로그인">
    </form>
    <form action="../main/index.php">
      <input type="submit" value="돌아가기">
    </form>
  </body>
</html>
