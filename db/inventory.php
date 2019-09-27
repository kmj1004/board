<?php
    include_once("../dbconnect.php");
    $sql = "SELECT *  FROM contents INNER JOIN category ON contents.cate_id = category.category_id INNER JOIN member ON contents.mem_id = member.member_id";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
