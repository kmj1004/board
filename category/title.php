<?php
    include_once("../dbconnect.php");

        $sql = "SELECT title, created, user_id FROM contents INNER JOIN category ON contents.cate_id = category.id
        INNER JOIN member ON contents.mem_id = member.id
        WHERE category=?";

        if($stmt = mysqli_prepare($conn, $sql)) {
          mysqli_stmt_bind_param($stmt, 's', $_GET['category']);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              echo "<tr><td><a href=\"..\/contents\/update.php?title={$row['title']}\">{$row['title']}</a></td>
                  <td>{$row['user_id']}</td>
                  <td>{$row['created']}</td></tr>";
          }
        }
