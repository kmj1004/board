<?php
    session_start();
    $id = $_SESSION['id'];
    $upload = $_POST['upload'];

    include_once("../dbconnect.php");
    $sql = "DELETE FROM contents WHERE id=?";
    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
    unlink("$upload");

    if($result==false) {
        echo "<script>alert('문제가 생겼습니다. 관리자에게 문의해주세요.');location.href='../main/index.php';</script>";
    } else {
        echo "<script>alert('삭제되었습니다!');location.href='../main/index.php';</script>";
    }
