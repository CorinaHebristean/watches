<?php include "header.php"; ?>


<h1>Login</h1>

<?= session_message('error') ?>

<form action="user_login.php" method="post">
    <p>
        Username <input type="text" name="username" placeholder="Username">
    </p>

    <p>
        Password <input type="password" name="password">
    </p>

    <input type="submit" name="submit" value="Login in">

</form>