<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <style>
      form {display: inline; }
    </style>
  </head>

  <body>
    <form action="update_process.php" method="post" enctype="multipart/form-data">
      <select name="category">
        <?php include_once("../uploads/file.php"); ?>
      </select>
      <input type="text" name="title" value="<?=$row['title'] ?>">
      <input type="file" name="file">
      <div contenteditable="true">
        <?php
            $file = $row['file'];
            if(isset($file)) { ?>
          <a href="<?=$file?>"
            download="<?=basename("$file")?>"><img src="<?=$file?>"></a>
        <?php } ?>
          <p><?=$row['contents']?></p>
      </div>
      <textarea name="contents" hidden>
        <div contenteditable="true">
          <?php if(isset($file)) { ?>
            <a href="<?=$file?>"
              download="<?=basename("$file")?>"><img src="<?=$file?>"></a>
          <?php } ?>
            <p><?=$row['contents']?></p>
        </div>
      </textarea>
      <input type="hidden" name="cate_id" value="<?=$row['cate_id']?>">
      <input type="hidden" name="mem_id" value="<?=$row['mem_id']?>">
      <input type="hidden" name="upload" value="<?=$file?>">
      <?php if(isset($user_id)) { ?>
        <input type="submit" value="수정">
      <?php } ?>
    </form>
    <form action="../main/index.php">
      <input type="submit" value="돌아가기">
    </form>
</html>
