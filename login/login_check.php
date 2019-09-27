<?php
    include_once("../dbconnect.php");

    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $sql = "SELECT user_id, password FROM member WHERE user_id=?";

    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if(!isset($row['user_id']) || !password_verify($password, $row['password'])) {
          echo "<script>alert('아이디 또는 비밀번호가 틀립니다.');location.href='../main/index.php';</script>";
        } else {
            session_start();
            $_SESSION['user_id'] = $user_id;
            header("Location: ../main/index.php");
        }
    }
