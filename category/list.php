<?php

    include_once("../db/category.php");

    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<strong><a href=\"index.php?category={$row['category']}\">{$row['category']}</a></strong><br>";
    }
    mysqli_stmt_close($stmt);
