<?php
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    include_once("../dbconnect.php");

    $sql = "SELECT user_id, user_name FROM member WHERE user_id=? OR user_name=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $user_id, $user_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if(isset($row['user_id'])) {
            echo "<script>alert('존재하는 아이디 입니다.');history.back();</script>";
            exit();
        } elseif(empty($user_id)) {
            echo "<script>alert('아이디를 입력해 주세요.');history.back();</script>";
            exit();
        } elseif(!preg_match("/^[a-zA-Z0-9]{5,15}$/", $user_id)) {
            echo "<script>alert('아이디는 5~15자의 영문자, 숫자만 사용 가능합니다.');history.back();</script>";
            exit();
        }
        if(isset($row['user_name'])) {
            echo "<script>alert('존재하는 닉네임 입니다.');history.back();</script>";
            exit();
        } elseif(empty($user_name)) {
            echo "<script>alert('닉네임을 입력해 주세요.');history.back();</script>";
        } elseif(!preg_match("/^[가-힣a-zA-Z0-9]{1,15}$/", $user_name)) {
            echo "<script>alert('닉네임은 1~15자의 한글, 영문자, 숫자만 사용 가능합니다.');history.back();</script>";
            exit();
        }
          mysqli_stmt_close($stmt);
      }

    if(empty($password) || (strlen($password) < 5) || (strlen($password) > 15)) {
        echo "<script>alert('비밀번호는 5~15자로 입력해 주세요.');history.back();</script>";
        exit();
    } elseif($password !=$_POST['pw_check']) {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');history.back();</script>";
        exit();
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('이메일 주소를 확인해 주세요.');history.back();</script>";
        exit();
    }

    $sql = "INSERT INTO member(user_id, user_name, password, email) VALUES (?, ?, ?, ?)";

    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $user_id, $user_name, $password, $email);
        $result=mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if($result==false) {
            echo "<script>alert('문제가 생겼습니다. 관리자에게 문의해주세요.');location.href='../main/index.php';</script>";
        } else {
            echo "<script>alert('회원가입 성공!');location.href='../main/index.php';</script>";
        }
    }
