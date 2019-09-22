<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
  </head>

  <body>
    <form action="update_process.php" method="post" enctype="multipart/form-data">
      카테고리
      <select name="category">
        <?php
            include_once("../db/category.php");
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<option value={$row['category']}>{$row['category']}</option>";
            } ?>
        </select>
      <p><input type="text" name="title" value="<?=$row['title'] ?>"></p>
      <p><input type="file" name="file"></p>
      <p><textarea style="height:300px; width:300px;" value="<?=$row['contents']?>"></textarea></p>
      <input type="submit" value="수정">
</html>
