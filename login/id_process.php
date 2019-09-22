<?php
    include_once("../dbconnect.php");

    $email = $_POST['email'];
    $sql = "SELECT user_id, email FROM member WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

   if(isset($row)) {
        echo "<script>alert('귀하의 아이디는 $row[user_id] 입니다.');location.href='../main/index.php';</script>";

    } else {
        echo "<script>alert('존재하지 않는 이메일 입니다.');history.back();</script>";
    }
