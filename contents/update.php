<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <style>
      form{ display: inline; }
      h5 { display: inline;
        margin-right: 30px; }
    </style>
  </head>

  <body>
    <p><h5>카테고리</h5>
    <form action="../contents/update_process.php" method="post" enctype="multipart/form-data">
      <select name="category" style="margin-left: 3px;">
        <?php include_once("../uploads/file.php"); ?>
      </select></p>
      <p><h5>제목</h5>
      <input type="text" name="title" style="margin-left: 30px;" value="<?=$row['title'] ?>"></p>
      <p><h5>파일 첨부</h5>
      <input type="file" name="file"></p>
      <?php
          $file = $row['file'];
          if(isset($file)) { ?>
            <p><a href="<?=$file?>" download="<?=basename("$file")?>"><img src="<?=$file?>"></a></p>
            <input type="hidden" name="upload" value="<?=$file?>">
      <?php } ?>
      <p><textarea name="contents" style="height:300px; width:400px;"><?=$row['contents']?></textarea></p>
      <?php
          if($user_id == $row['user_id']) { ?>
              <input type="hidden" name="id" value="<?=$row['id']?>">
              <input type="submit" style="margin-left:115px;"value="수정">
            </form>
            <form action="../contents/delete.php" method="post">
              <input type="hidden" name="upload" value="<?=$file?>">
              <input type="submit" style="margin-left:10px; margin-right:10px; "value="삭제">
            </form>
      <?php } else { ?>
              </form>
      <?php } ?>
      <form action="../main/index.php">
        <input type="submit" value="돌아가기">
      </form>
</html>
