<?php

require_once "dbconfig.php";
require_once "functions.php";

if (!isset($_POST["submit"])){
    echo "Do not access me direcytly.";
    exit;
}

//Pas1. Citirea datelor 
$id = $_GET["id"];
$brand = $_POST["brand"];
$title = $_POST["title"];
$description = $_POST["description"];
$price = $_POST["price"];
$currency = $_POST["currency"];
$stock = $_POST["stock"];

// Pas2: Validarea datelor 
// validate form
$valid = validate_watch_form();

// Pas3. Actualizarea datelor 
// doar daca datele sunt valide
if(!$valid){
    header("Location: update_form.php?id=$id");
    exit;
} else {
    $sql = "UPDATE watches
            SET brand = '$brand',
                title = '$title',
                description = '$description',
                price = '$price',
                currency = '$currency',
                stock = '$stock'
            WHERE id = $id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION["message"] = "Product with id $id updated successfully!";
    header("Location: list.php");
    exit;
}



