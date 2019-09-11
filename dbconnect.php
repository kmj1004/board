<?php
    define('SERVER', 'localhost');
    define('ID', 'board');
    define('PW', 'admin123!@');
    define('DB', 'board');

    $conn = mysqli_connect(SERVER, ID, PW, DB);
/*
    if (!$conn) {
        die("연결 실패: ". mysqli_connect_error());

    }
*/
