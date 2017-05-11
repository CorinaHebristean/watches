<?php

include "header.php";

$id = $_GET["id"];

//citim cartul din sessiune
$cart = $_SESSION["cart"];

//stergem produsul cu idul dorit
unset($cart[$id]);

// salvam cosul in sessiune
$_SESSION["cart"] = $cart;

$_SESSION["message"] = "Produsul cu id $id a fost sters";

header ("Location: cart.php");
exit;
