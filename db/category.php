<?php
    include_once("../dbconnect.php");
    $sql = "SELECT category FROM category";
    $result = mysqli_query($conn, $sql);
