<?php

require_once "dbconfig.php";
require_once "functions.php";

//daca nu este apasat butonul submit sa se afiseze mesajul
if (!isset($_POST["submit"])) {
    echo "Not allowed!";
    exit;
}

$name = $_POST["brand_name"];

$sql = "INSERT INTO watches_brand(name)
        VALUES ('$name')";

$stmt = $conn->prepare($sql);
$stmt->execute();

header ("Location: brand_list.php");
exit;
