<?php

    include_once("../db/category.php");

    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<li><a href=\"index.php?category={$row['category']}\">{$row['category']}</a></li>";
    }
    mysqli_stmt_close($stmt);
