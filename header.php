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
<nav>
    <ul>
        <li>
            <a href="list.php">Watches</a>
        </li>
        <li>
            <a href="brand_list.php">Brands</a>
        </li>

        <?php if (!is_loggedin()): ?>
            <li>
                <a href="user_login_form.php">Login</a>
            </li>
        <?php else: ?>
            <li>
                <a href="user_profile.php">My profile</a>
            </li>
            <li>
                <a href="user_logout.php">Logout</a>
            </li>
        <?php endif ?>
    </ul>
    <div class="clear"></div>
</nav>
    