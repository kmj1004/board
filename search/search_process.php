<?php
//    session_start();
    include_once("../dbconnect.php");

    $select = $_POST['select'];
    $search = $_POST['search'];
    switch ($select) {
          case "search_user":
              $sql = "SELECT title, user_id, created, mem_id, cate_id FROM contents
              INNER JOIN category ON contents.cate_id = category.category_id INNER JOIN member ON contents.mem_id = member.member_id WHERE user_id=?";
              break;
          case "search_title":
              $sql = "SELECT title, user_id, created, mem_id, cate_id FROM contents
              INNER JOIN category ON contents.cate_id = category.category_id INNER JOIN member ON contents.mem_id = member.member_id WHERE title LIKE CONCAT('%', ?, '%')";
              break;
          case "search_contents":
              $sql = "SELECT title, user_id, created, mem_id, cate_id FROM contents INNER JOIN category ON contents.cate_id = category.category_id INNER JOIN member ON contents.mem_id = member.member_id WHERE contents LIKE CONCAT('%', ?, '%')";
              break;
          case "search_combine":
              $sql = "SELECT title, user_id, created, mem_id, cate_id FROM contents INNER JOIN category ON contents.cate_id = category.category_id INNER JOIN member ON contents.mem_id = member.member_id WHERE title LIKE CONCAT('%', ?, '%') OR contents LIKE CONCAT('%', ?, '%')";
      }

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $search);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr><td><a href=\"../main/index.php?title={$row['title']}\">{$row['title']}</a></td>
        <td>{$row['user_id']}</td>
        <td>{$row['created']}</td></tr>";
        $_SESSION['member_id'];
        $_SESSION['cate_id'];
      }
