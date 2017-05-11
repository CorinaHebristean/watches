<?php include "header.php"; ?>

<form action="add_product.php" method="post">

    <p>Brand
        <select name="brand">
            <option value="">Choose</option>
                <?php select_brand(); ?>
        </select>
        <?php session_message("brand") ?>
    </p>

    <p>
        Title <input type="text" name="title" value="<?= $_SESSION["title"]; unset($_SESSION["title"]); ?>">
        <?php session_message("title") ?>
    </p>

    <p> Description <br>
        <textarea class="textarea-dim" name="description" placeholder="Describe the product"></textarea>
        <?php session_message("description") ?>

    </p>

    <p>
        Price <input type="number" name="price" min="0" value="<?= $_SESSION["price"]; unset($_SESSION["price"]); ?>">
        <?php session_message("price") ?>

    </p>

    <p> 
        Currency <br> <?php select_currency(); ?>
        <?php session_message("currency") ?>
    </p>

    <p>
        Stock <input type="number" name="stock" min="0" value="<?= $_SESSION["stock"]; unset($_SESSION["stock"]); ?>">
        <?php session_message("stock") ?>
    </p>

    <input type="submit" name="submit" value="Add">

</form>    
</body>
</html>