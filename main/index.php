<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <style>
      .grid-container{
        display: grid;
        grid-template-columns: 1fr 2fr;
        grid-template-rows: 1fr 1fr; }
      .item {
        grid-area: 1 / 2 / 3 / 3;
      }
      table { width:50%;
        border-botom: 1px solid gray; }
      form {display: inline; }
    </style>
  </head>

  <body>
    <div class="grid-container">
      <div>
        <?php include_once("main.php"); ?>
      </div>
      <div class="item">
        <table>
          <tr>
            <td>제목</td>
            <td>작성자</td>
            <td>작성일</td>
          </tr>
            <?php include_once("../category/title.php"); ?>
        </table>
      </div>
      <div>
        <?php
            if($user_id=='admin') {
                include_once("../category/list.php");
                include_once("../category/category.php");
            } else { ?>
                <?php include_once("../category/list.php");
            } ?>
      </div>
    </div>
  </body>
</html>
