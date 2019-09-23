<?php
    include_once("../dbconnect.php");

    if($_GET['category'] == NULL) {
        $sql = "SELECT title, created, user_id, mem_id, cate_id FROM contents INNER JOIN category ON contents.cate_id = category.category_id
        INNER JOIN member ON contents.mem_id = member.member_id";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          echo "<tr><td><a href=\"index.php?title={$row['title']}\">{$row['title']}</a></td>
          <td>{$row['user_id']}</td>
          <td>{$row['created']}</td></tr>";
          $_SESSION['member_id'] = $row['mem_id'];
          //$_SESSION['category_id'] = $row['cate_id'];
        }
    } else {
          $sql = "SELECT title, created, user_id, mem_id, cate_id FROM contents INNER JOIN category ON contents.cate_id = category.category_id
          INNER JOIN member ON contents.mem_id = member.member_id
          WHERE category=?";

          if($stmt = mysqli_prepare($conn, $sql)) {
              mysqli_stmt_bind_param($stmt, 's', $_GET['category']);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  echo "<tr><td><a href=\"index.php?title={$row['title']}\">{$row['title']}</a></td>
                  <td>{$row['user_id']}</td>
                  <td>{$row['created']}</td></tr>";
                  $_SESSION['member_id'] = $row['mem_id'];
                  //$_SESSION['category_id'] = $row['cate_id'];
              }
          }
      }
