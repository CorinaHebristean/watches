<?php

include "header.php";

$brand = $_GET["brand"];

$sql = "SELECT * FROM watches
        WHERE brand = '$brand'";

$stmt = $conn->prepare($sql);
$stmt->execute();

$watches = $stmt->fetchAll();

echo count($watches) . " in brand $brand";
