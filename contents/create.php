<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style>
      form{ display: inline; }
      h5 { display: inline;
        margin-right: 30px; }
      body { margin-top:150px;
        margin-left:700px; }
    </style>
  </head>

  <body>
    <p><h5>카테고리</h5>
    <form action="create_process.php" method="post" enctype="multipart/form-data">
      <select name="category" style="margin-left: 3px;">
        <?php
            include_once("../db/category.php");
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<option value={$row['category']}>{$row['category']}</option>";
            }
            mysqli_stmt_close($stmt);
        ?>
      </select></p>
      <p><h5>제목</h5>
      <input type="text" name="title" style="margin-left: 30px;"></p>
      <p><h5>파일 첨부</h5>
      <input type="file" name="file"></p>
      <p><textarea style="height:300px; width:400px;"name="contents"></textarea></p>
      <input type="submit" value="등록" name="submit" style="margin-left:140px;">
    </form>
    <form action="../main/index.php">
      <input type="submit" value="돌아가기">
    </form>
  </body>
</html>
