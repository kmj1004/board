<?php
    include_once("../dbconnect.php");
    $sql = "SELECT category FROM category";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
