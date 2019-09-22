<?php
    session_start();
    $mem_id = $_SESSION['member_id'];
    $cate_id = $_SESSION['category_id'];
    $user_id = $_SESSION['user_id'];
    include_once("../dbconnect.php");


    $sql = "INSERT INTO contents(title, cate_id, file, contents, created, mem_id) VALUES(?, ?, ?, ?, ?, ?)";

    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sisssi", $title, $cate_id, $file, $contents, $created, $mem_id);

        $title = $_POST['title'];
        $file = $_POST['file'];
        $contents = $_POST['contents'];
        $created = date("Y-m-d h:i:s");
        //echo "$mem_id";
        //echo "$cate_id";
        //echo "$user_id";

        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if($result==false) {
            echo "<script>alert('문제가 생겼습니다. 관리자에게 문의해주세요.');location.href='../main/index.php';</script>";
        } else {
            echo "<script>alert('등록되었습니다!');location.href='../main/index.php';</script>";
        }
    }
