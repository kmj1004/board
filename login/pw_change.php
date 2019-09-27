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
    <h1>비밀번호 변경</h1>
    <form action="change_process.php" method="post">
      <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
      <p><input type="password" name="pw" placeholder="새로운 비밀번호"></p>
      <p><input type="password" name="pwcheck" placeholder="비밀번호 확인"></p>
      <input type="submit" value="변경">
    </form>
    <form action="../main/index.php">
      <input type="submit" value="돌아가기">
    </form>
  </body>
</html>
