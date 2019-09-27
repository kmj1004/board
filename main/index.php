<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <style>
      .grid-container {
        display: grid;
        grid-template-columns: 0.5fr 2fr;
        grid-template-rows: 1fr 10fr;
        margin-top: 150px;
        margin-left: 150px; }
      .item {
        grid-area: 1 / 2 / 3 / 3;
        height: 500px; }
      #main, #list {
        border-right: 2px solid lightgray;
        width: 250px;
        text-align: center;
      }
      table,tr,td { width: 850px;
        border-bottom: 1px solid lightgray;
        border-collapse: collapse; }
      form {display: inline; }
      a {text-decoration: none; color:black; }
    </style>
  </head>

  <body>
    <div class="grid-container">
      <div id="main">
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

            <?php
                if(isset($_POST['search'])) {
                    include_once("../search/search_process.php");
                } else {
                      include_once("../category/title.php");
                }
                ?>
        </table>
        <br>
        <?php
            include_once("../search/search.php");
        ?>
      </div>
      <div id="list">
        <?php
            if($user_id=='admin') {
                include_once("../category/list.php"); ?>
                <br>
                <form action="../category/category_process.php" method="post">
                  <input type="text" placeholder="카테고리" name="category" style="width:100px;">
                  <input type="submit" value="생성" style="width:40px; ">
                </form>
        <?php   } else {
                    include_once("../category/list.php");
            } ?>
      </div>
    </div>
  </body>
</html>
