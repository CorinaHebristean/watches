<?php

include "header.php";

$cart = $_SESSION["cart"];

?>

<h1>My cart (<?= count_cart_products(); ?>)</h1>

<h3>
    <?php
        if(isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }
    ?>
</h3>

<table>
    <tr>
        <th>Product ID</th>
        <th>Title</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Action</th>
    </tr>

    <?php foreach ($cart as $product) : ?>
    <tr>
        <td> <?= $product["id"]; ?> </td>
        <td> <?= $product["title"] ?></td>
        <td> <?= $product["price"] ?> </td>
        <td> <?= $product["q"] ?> </td>
        <td> <?= $product["price"] * $product["q"] ?> </td>
        <td><a href="remove_from_cart.php?id=<?= $product["id"]?>">Remove from cart</a></td>    
    </tr>

    <?php endforeach ?>
</table>

<h3>Total: <?= calculate_total() ?></h3>

