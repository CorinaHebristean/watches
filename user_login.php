<?php

require_once "dbconfig.php";

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users
            WHERE username = '$username'
            AND password = '$password'";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $user = $stmt->fetch();
//var_dump($user);
//exit;
    if ($user) {
        $_SESSION["logged_in"] = 1;
        $_SESSION["user"] = $user;

        header ("Location: user_profile.php");
        exit;

    } else {
        $_SESSION["message"]["error"] = "Bad credentials!";

        header ("Location: user_login_form.php");
        exit;
    }
}