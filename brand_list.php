<?php

require_once "dbconfig.php";

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
    </tr>

    <?php foreach($watches_brand as $brand): ?>
    <tr>
        <td> <?= $brand["id"] ?> </td>
        <td> <?= $brand["name"] ?> </td>
    </tr>
    <?php endforeach ?>
</table>