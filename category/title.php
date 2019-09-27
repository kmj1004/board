<?php
    include_once("../dbconnect.php");

    $sql = "SELECT member_id, user_id FROM member";
    if($stmt = mysqli_prepare($conn, $sql)) {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          if($user_id==$row['user_id']) {
              $_SESSION['member_id'] = $row['member_id'];
          }
      }
      mysqli_stmt_close($stmt);
    }

    if($_GET['category'] == NULL) {
        $sql = "SELECT * FROM contents INNER JOIN category ON contents.cate_id = category.category_id
        INNER JOIN member ON contents.mem_id = member.member_id";

        if($stmt = mysqli_prepare($conn, $sql)) {
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              echo "<tr><td><a href=\"index.php?title={$row['title']}\">{$row['title']}</a></td>
              <td>{$row['user_name']}</td>
              <td>{$row['created']}</td></tr>";
          }
        mysqli_stmt_close($stmt);
        }
    } else {
          $sql = "SELECT * FROM contents INNER JOIN category ON contents.cate_id = category.category_id
          INNER JOIN member ON contents.mem_id = member.member_id WHERE category=?";

          if($stmt = mysqli_prepare($conn, $sql)) {
              mysqli_stmt_bind_param($stmt, 's', $_GET['category']);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  echo "<tr><td><a href=\"index.php?title={$row['title']}\">{$row['title']}</a></td>
                  <td>{$row['user_name']}</td>
                  <td>{$row['created']}</td></tr>";
              }
          }
        mysqli_stmt_close($stmt);
      }
