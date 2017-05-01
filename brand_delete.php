<?php

require_once "dbconfig.php";

$id = $_GET["id"];

$sql = "SELECT * FROM watches_brand
        WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$brand = $stmt->fetch();

$sql = "DELETE FROM watches_brand
        WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();

$_SESSION["message"]["brands"] = "Brand with id $id was successfully deleted!";
header ("Location: brand_list.php");
