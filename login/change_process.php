<?php
    include_once("../dbconnect.php");

    $pw = $_POST['pw'];
    $pwcheck = $_POST['pwcheck'];
    $user_id = $_POST['user_id'];
    if(empty($pw) || (strlen($pw) < 5) || (strlen($pw) > 15)) {
        echo "<script>alert('비밀번호는 5~15자로 입력해 주세요.');history.back();</script>";
        exit();
    } elseif($pw !=$pwcheck) {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');history.back();</script>";
        exit();
    } else {
        $pw = password_hash($pw, PASSWORD_DEFAULT);
        $sql = "UPDATE member SET password=? WHERE user_id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $pw, $user_id);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if($result==false) {
            echo "<script>alert('문제가 생겼습니다. 관리자에게 문의해주세요.');location.href='../main/index.php';</script>";
        } else {
            echo "<script>alert('비밀번호 변경 완료!');location.href='../main/index.php';</script>";
        }
    }
