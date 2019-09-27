<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style>
      body {text-align: center;
        margin-top:150px; }
      form { display: inline; }
    </style>
  </head>
  <body>
    <h1>비밀번호 찾기</h1>
    <form action="pw_process.php" method="post">
      <p><input type="text" name="user_id" placeholder="아이디"></p>
      <p><input type="text" name="email" placeholder="이메일"></p>
      <input type="submit" value="찾기">
      </form>
    <form action="../main/index.php">
      <input type="submit" value="돌아가기">
    </form>
  </body>
</html>
