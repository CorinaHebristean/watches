<?php

include "header.php";

$id = $_GET["id"];
$q = 1;

$sql = "SELECT * FROM watches
        WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt -> execute();

$result = $stmt->fetch();
// echo "<pre>";
// var_dump($result);

//
$product = [
    "id" => $id,
    "title" => $result["title"],
    "price" => $result["price"],
    "q" => $q,
];
 //var_dump($product);

//salvam produsul in sesiune
$_SESSION["cart"][$id] = $product;

//dupa ce se adauga in cos
//sa se afiseze mesajul pe pagina cu produse 
$_SESSION["message"] = "Produsul cu id: $id a fost adaugat in cos";

header ("Location: list.php");
exit;
