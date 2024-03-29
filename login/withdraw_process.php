<?php
    session_start();
    $member_id = $_SESSION['member_id'];

    include_once("../dbconnect.php");
    $sql = "DELETE FROM member WHERE member_id=?";
    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $member_id);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);

    if($result == false) {
        echo "<script>alert('문제가 생겼습니다. 관리자에게 문의해주세요.');location.href='../main/index.php';</script>";
    } else {
        echo "<script>alert('탈퇴되었습니다.');location.href='../main/index.php';</script>";
    }
    session_destroy();
