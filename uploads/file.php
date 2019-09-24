<?php
    include_once("../db/category.php");
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value={$row['category']}>{$row['category']}</option>";
    }
    mysqli_stmt_close($stmt);

    include_once("../db/inventory.php");
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if($_GET['title']==$row['title']) {
            break;
      }
    }
    mysqli_stmt_close($stmt);
