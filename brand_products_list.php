<?php

include "header.php";

$brand = $_GET["brand"];

$sql = "SELECT * FROM watches
        WHERE brand = '$brand'";

$stmt = $conn->prepare($sql);
$stmt->execute();

$watches = $stmt->fetchAll();

?>

<h2><?= $brand ?> - <?= count($watches) ?> models </h2>

<p>
    <a href="list.php">Go back to detailed list</a>
</p>

<table>
    <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Pieces</th>
        <th class="table-actions">Action</th>        
    </tr>

<?php foreach($watches as $watch): ?>
    <tr>
        <td> <?= $watch["id"] ?> </td>
        <td> <?= $watch["brand"] ?> </td>
        <td> <?= $watch["title"] ?> </td>
        <td> <?= $watch["stock"] ?> </td>
        <td>
            <a href="add_to_cart.php?id=<?= $watch["id"]?>">Adauga in cos</a>
            <br>
            <a href="update_form.php?id=<?php echo $watch["id"]?>">Edit</a>
            <a href="delete.php?id=<?php echo $watch["id"]?>"
                onclick="if (!window.confirm('Are you sure?')) return false;">
                Delete</a>
        </td>        
    </tr>
    <?php endforeach ?>

</table>
