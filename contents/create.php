<!DOCTYPE html>
<?php
    //session_start();
?>

<html>
  <head>
    <meta charset="utf-8">
    <style>
      form {display: inline; }
    </style>
  </head>

  <body>
    <form action="create_process.php" method="post" enctype="multipart/form-data">
      <select name="category">
        <?php
            include_once("../db/category.php");
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<option value={$row['category']}>{$row['category']}</option>";
            }
            mysqli_stmt_close($stmt);
        ?>
      </select>
      <input type="text" placeholder="제목" name="title">
      <input type="file" name="file">
      <p><textarea style="height:300px; width:300px;"name="contents"></textarea></p>
      <input type="hidden" name="cate_id" value="<?=$row['cate_id']?>">
      <input type="submit" value="등록" name="submit">
    </form>
    <form action="../main/index.php">
      <input type="submit" value="돌아가기">
    </form>
  </body>
</html>
