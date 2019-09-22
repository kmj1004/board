<?php
    include_once("../dbconnect.php");

    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $sql = "SELECT user_id, email FROM member WHERE user_id=? AND email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $user_id, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);

    $password= mt_rand(100000, 999999);
    if($row) {
        ini_set("SMTP", "ssl://smtp.naver.com");
        ini_set("smtp_port", "587");
        $to = 'nara881004@naver.com';
        $subject = '임시 비밀번호 발송';
        $message =
        '임시 비밀번호는'.$password.'입니다.
        로그인 후 비밀번호를 변경해 주세요.';
        $headers = 'From: nara881004@naver.com' ."\r\n".
        'Reply-To: nara881004@naver.com' ."\r\n".
        'X-Mailer: PHP/' .phpversion();
        mail($to, $subject, $message, $headers);
    }
/*
    $sql = "UPDATE member SET password=? WHERE user_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $password, $user_id);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if($result == false) {
        echo "<script>alert('문제가 생겼습니다. 관리자에게 문의해주세요.');location.href='../main/index.php';</script>";
    } else {
        echo "<script>alert('{$email}로 임시 비밀번호가 발송되었습니다.');location.href='../main/index.php';</script>";
    }
