<?php

require_once "dbconfig.php";
require_once "functions.php";

//daca nu este apasat butonul submit sa se afiseze mesajul
if (!isset($_POST["submit"])) {
    echo "Not allowed!";
    exit;
}

//definesc valorile
$brand = $_POST["brand"];
$title = $_POST["title"];
$description = $_POST["description"];
$price = $_POST["price"];
$currency = $_POST["currency"];
$stock = $_POST["stock"];

// validate form
$valid = validate_watch_form();


if(!$valid){
    header("Location: add_product_form.php");
    exit;

} else {
    $sql = "INSERT INTO watches(brand, title, description, price, currency, stock)
            VALUES('$brand', '$title', '$description', '$price', '$currency', '$stock')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $_SESSION["message"] = "Product added successfully!";
    header("Location: list.php");
}