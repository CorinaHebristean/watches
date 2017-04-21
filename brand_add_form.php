<?php
    require_once "dbconfig.php"; 
    require_once "functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
    </head>
<body>

<form action="brand_add.php" method="post">
    <input type="text" name="brand_name">
    
    <input type="submit" name="submit" value="Adauga brand">
</form>