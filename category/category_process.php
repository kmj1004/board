<?php
    $category = $_POST['category'];
    include_once("../dbconnect.php");
    var_dump($category);
    $sql = "SELECT category FROM category WHERE category=?";

    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $category);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if($row['category']) {
            echo "<script>alert('이미 존재합니다.'); location.href='../main/index.php';</script>";
        } elseif(strlen($category) > 15) {
            echo "<script>alert('15자 이하로 입력해 주세요.');location.href='../main/index.php';</script>";
        }
        mysqli_stmt_close($stmt);
      }

    $sql = "INSERT INTO category(category) VALUES (?)";

    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $category);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if($result==false) {
            echo "<script>alert('문제가 생겼습니다. 관리자에게 문의해주세요.');location.href='../main/index.php';</script>";
        } else {
            echo "<script>alert('카테고리 생성 완료!');location.href='../main/index.php';</script>";
        }
    }
