<?php

require_once "dbconfig.php";

$id = $_GET["id"];

$sql = "SELECT * FROM watches
        WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$watch = $stmt->fetch();

$sql = "DELETE FROM watches
        WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();

$_SESSION["message"] = "Product with id $id was succesfully deteled.";
header("Location: list.php");