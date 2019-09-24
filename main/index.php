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
        grid-area: 1 / 2 / 3 / 3; }
      table,tr,td { width: 850px;
        border-bottom: 1px solid lightgray;
        border-collapse: collapse; }
      form {display: inline; }
      a {text-decoration: none; color:black; }
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
            <?php
                if(isset($_GET['title'])) {
                  include_once('../contents/update.php');
                  exit();
                } else {
                    echo "<td>제목</td>
                    <td>작성자</td>
                    <td>작성일</td>";
                }
            ?>
          </tr>
          <tr>
            <?php
                include_once("../search/search.php");
                if(isset($_POST['search'])) {
                    include_once("../search/search_process.php");
                    exit();
                }
            ?>
          </tr>
            <?php include_once("../category/title.php"); ?>
        </table>
      </div>
      <div>
        <?php
            if($user_id=='admin') {
                include_once("../category/list.php"); ?>
                <form action="../category/category_process.php" method="post">
                  <input type="text" placeholder="카테고리" name="category">
                  <input type="submit" value="생성">
                </form>
        <?php   } else {
                    include_once("../category/list.php");
            } ?>
      </div>
    </div>
  </body>
</html>
