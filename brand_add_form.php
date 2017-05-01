<?php include "header.php"; ?>

<form action="brand_add.php" method="post">
    <input type="text" name="brand_name">
    <?= session_message("brand_name"); ?>
    
    <input type="submit" name="submit" value="Adauga brand">
</form>