<?php

    session_start();
    $id = $_POST['id'];
    $upload = $_POST['upload'];

    include_once("../dbconnect.php");
    $category = $_POST['category'];
    $sql = "SELECT * FROM category WHERE category=?";
    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 'i', $category);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if($row['category'] == $category) {
                break;
          }
        }
        $cate_id = $row['category_id'];
        mysqli_stmt_close($stmt);
      }

    $targetdir = "../uploads/";
    $targetfile = $targetdir.basename($_FILES["file"]["name"]);
    $filetype = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));
    $filename = basename($_FILES["file"]["name"], ".$filetype");
    $sql = "SELECT file FROM contents";
    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if($row['file'] == $targetfile) {
                $targetfile = $targetdir.$filename.mt_rand(1,99999).".".$filetype;
            }
        }
        mysqli_stmt_close($stmt);
    }

    $tmp_file = $_FILES["file"]["tmp_name"];
    $imagetype = array('jpg', 'jpeg', 'png');
    if(in_array($filetype, $imagetype)) {
        unlink("$upload");
        list($width, $height) = getimagesize($tmp_file);
        $percent = 0.3;
        $new_width = $width * $percent;
        $new_height = $height * $percent;
        $newimage = imagecreatetruecolor($new_width, $new_height);
        switch($filetype) {
            case 'jpg':
            case 'jpeg':
              $source = imagecreatefromjpeg($tmp_file);
              imagecopyresampled($newimage, $source, 0,0,0,0, $new_width, $new_height, $width, $height);
              imagejpeg($newimage, $targetfile);
              break;
            case 'png':
              $source = imagecreatefrompng($tmp_file);
              imagecopyresampled($newimage, $source, 0,0,0,0, $new_width, $new_height, $width, $height);
              imagepng($newimage, $targetfile);
              break;
        }
    } elseif(empty($filetype)) {
          $targetfile = $upload;
    } else {
          move_uploaded_file($tmp_file, $targetfile);
    }

    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $created = date("Y-m-d");
    /*
    var_dump($mem_id);
    var_dump($title);
    var_dump($targetfile);
    var_dump($contents);
    var_dump($created);
    var_dump($cate_id);
*/
    $sql = "UPDATE contents SET title = ?, cate_id = ?, file = ?, contents = ?, created = ? WHERE id = ?";
    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sisssi', $title, $cate_id, $targetfile, $contents, $created, $id);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if($result==false) {
            echo "<script>alert('문제가 생겼습니다. 관리자에게 문의해주세요.');location.href='../main/index.php';</script>";
        } else {
            echo "<script>alert('수정되었습니다!');location.href='../main/index.php';</script>";
        }
    }
