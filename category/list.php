<?php

    include_once("../db/category.php");

    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<dt><a href=\"index.php?category={$row['category']}\">{$row['category']}</a></dt>";
    }
    mysqli_stmt_close($stmt);
