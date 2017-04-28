<?php

require_once "dbconfig.php";
require_once "brand_functions.php";

//citesc datele
$id = $_GET["id"];
$name = $_POST["name"];

//validarea datelor
$valid = validate_brand();

//daca datele sunt valide, actualizarea lor
if(!$valid) {
    header("Location: brand_edit_form.php?id=$id");
    exit;
} else {
    $sql = "UPDATE watches_brand
            SET name = '$name'
            WHERE id = $id";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION["message"] = "Product with id $id was successfully updated!";
    header("Location: brand_list.php");
    exit;
}
