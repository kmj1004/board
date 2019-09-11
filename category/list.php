<?php
    include_once("../dbconnect.php");

    $sql = "SELECT category FROM category";
    $result = mysqli_query($conn, $sql);
    $list='';


    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<dt><a href=\"index.php?category={$row['category']}\">{$row['category']}</dt>";
    }
