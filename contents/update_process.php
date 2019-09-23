<?php
    include_once("../dbconnect.php");

    $sql = "UPDATE contents SET title = ?, cate_id = ?,
        file = ?, contents = ?, created = ? WHERE mem_id = ?";

    $targetdir = "../uploads/";
    $targetfile = $targetdir.basename($_FILES["file"]["name"]);
    if($targetfile != $_POST['upload']) {
        $tmp_file = $_FILES["file"]["tmp_name"];
        $filetype = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));
        $imagetype = array('jpg', 'jpeg', 'png');
        if(in_array($filetype, $imagetype)) {
            list($width, $height) = getimagesize($tmp_file);
            $percent = 0.5;
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
                  imagecopyresamped($newimage, $source, 0,0,0,0, $new_width, $new_height, $width, $height);
                  imagepng($newimage, $targetfile);
                  break;
            }
        } else {
            move_uploaded_file($tmp_file, $targetfile);
          }
    }

    if($stmt = mysqli_prepare($conn, $sql)) {
        $title = $_POST['title'];
        $cate_id = $_POST['cate_id'];
        $contents = $_POST['contents'];
        $created = date("Y-m-d h:i:s");
        $mem_id = $_POST['mem_id'];

        mysqli_stmt_bind_param($stmt, 'sisssi', $title, $cate_id, $targetfile, $contents, $created, $mem_id);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if($result==false) {
            echo "<script>alert('문제가 생겼습니다. 관리자에게 문의해주세요.');location.href='../main/index.php';</script>";
        } else {
            echo "<script>alert('수정되었습니다!');location.href='../main/index.php';</script>";
        }
    }
