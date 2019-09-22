<!DOCTYPE html>
<?php
    //session_start();
    //$user_id = $_SESSION['user_id'];
    //print($_SESSION['member_id']);
?>

<html>
  <head>
    <meta charset="utf-8">
  </head>

  <body>
    <form action="create_process.php" method="post" enctype="multipart/form-data">
      <select name="category">
        <?php
            include_once("../db/category.php");
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<option value=\"{$row['category']}\">{$row['category']}
            </option>";
          } ?>
      </select>
      <input type="text" placeholder="제목" name="title">
      <inpyt typr="file" name="file">
      <p><textarea style="height:300px; width:300px;"name="contents"></textarea></p>
      <input type="submit" value="등록">
    </form>
  </body>
</html>
