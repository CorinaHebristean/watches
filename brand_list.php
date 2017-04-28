<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
    </head>
<body>

<?php

require_once "dbconfig.php";
require_once "functions.php";


$sql = "SELECT * FROM watches_brand";
$stmt = $conn->prepare($sql);
$stmt->execute();

$watches_brand = $stmt->fetchAll();

?>

<p>
    <a href="brand_add_form.php">Add brand</a>
</p>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

    <?php foreach($watches_brand as $brand): ?>
    <tr>
        <td> <?= $brand["id"] ?> </td>
        <td> <?= $brand["name"] ?> </td>
        <td>
            <a href="brand_edit.php?id=<?= $brand["id"]?>">Edit</a>
            <a href="brand_delete.php?id=<?= $brand["id"]?>">Delete</a>
        </td>
    </tr>
    <?php endforeach ?>
</table>
</body>
</html>
