<?php

require_once "dbconfig.php";
require_once "functions.php";

//daca nu este apasat butonul submit sa se afiseze mesajul
if (!isset($_POST["submit"])) {
    echo "Not allowed!";
    exit;
}

$name = $_POST["brand_name"];

//Save value in session
$_SESSION["brand_name"] = $name;

//validate form
$valid = validate_brand();

if(!$valid) {
    header("location: brand_add_form.php");
    exit;
} else {
    $sql = "INSERT INTO watches_brand(name)
            VALUES ('$name')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION["message"]["brands"] = "Brand added successfully!";
    header ("Location: brand_list.php");
}
