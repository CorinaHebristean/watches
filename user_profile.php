<?php 

    include "header.php"; 

    $user = $_SESSION["user"];

?>

<h1>Welcome <?= $user["username"] ?></h1>
