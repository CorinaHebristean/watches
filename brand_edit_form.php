<?php
    require_once "dbconfig.php";
    require_once "brand_functions.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
    </head>
<body>
<?php

$id = $_GET["id"];

$sql = "SELECT * FROM watches_brand
        WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$brand = $stmt->fetch();

?>

<form action="brand_edit.php?id=<?= $brand["id"]?>" method="post">

    <p>
        Name <input type="text" name="name" value="<?= $brand["name"]?>">
        <?php brand_session_message("name") ?>
    </p>

    <input type="submit" name="submit" value="Update">
    
</form>
</body>
</html>
