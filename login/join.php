<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원가입</title>
    <style>
    form { display: inline; }
    body { margin-top:150px;
      text-align: center; }
    </style>
  </head>
  <body>
    <h2>회원가입</h2>
    <form action="join_process.php" method="post">
      <p><input type="text" name="user_id" placeholder="아이디"></p>
      <p><input type="text" name="user_name" placeholder="닉네임"></p>
      <p><input type="password" name="password" placeholder="비밀번호"</p>
      <p><input type="password" name="pw_check" placeholder="비밀번호 확인"</p>
      <p><input type="text" name="email" placeholder="이메일"></p>
      <input type="submit" value="회원가입">
    </form>
    <form action="../main/index.php">
      <input type="submit" value="돌아가기">
    </form>
  </body>
</html>
