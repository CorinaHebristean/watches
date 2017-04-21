<?php
    require_once "dbconfig.php"; 
    require_once "functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
    </head>
<body>

<form action="add_product.php" method="post">

    <p>Brand
        <select name="brand">
            <option value="">Choose</option>
                <?php select_brand(); ?>
        </select>
        <?php session_message("brand") ?>
    </p>

    <p>
        Title <input type="text" name="title">
        <?php session_message("title") ?>
    </p>

    <p> Description <br>
        <textarea name="description" placeholder="Describe the product"></textarea>
        <?php session_message("description") ?>

    </p>

    <p>
        Price <input type="text" name="price">
        <?php session_message("price") ?>

    </p>

    <p> 
        Currency <br> <?php select_currency(); ?>
        <?php session_message("currency") ?>
    </p>

    <p>
        Stock <input type="number" name="stock" min="0">
        <?php session_message("stock") ?>
    </p>

    <input type="submit" name="submit" value="Add">

</form>    
</body>
</html>