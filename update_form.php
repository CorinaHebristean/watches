<?php
    require_once "dbconfig.php"; 
    require_once "functions.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
    </head>
<body>
<?php

$id = $_GET["id"];

$sql = "SELECT * FROM watches
        WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$watch = $stmt->fetch();

?>

<form action="update.php?id=<?php echo $watch["id"]?>" method="post">
    <p>
        Brand 
        <select name="brand">
            <?php select_brand($watch["brand"]); ?>
        </select>
        <?php session_message("brand") ?>

    </p>

    <p>
        Title <input type="text" name="title" value="<?php echo $watch["title"]?>">
        <?php session_message("title") ?>

    </p>

    <p>
        Description <textarea name="description"><?php echo $watch["description"]?></textarea>
        <?php session_message("description") ?>

    </p>

    <p>
        Price <input type="text" name="price" value="<?php echo $watch["price"]?>">
        <?php session_message("price") ?>

    </p>

    <p>
        Currency <br> <?php select_currency($watch["currency"]); ?>
        <?php session_message("currency") ?>

    </p>

    <p>
        Stock <input type="number" name="stock" value="<?php echo $watch["stock"]?>">
        <?php session_message("stock") ?>

    </p>

    <input type="submit" name="submit" value="Update!">
    
</form>
</body>
</html>