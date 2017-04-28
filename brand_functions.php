<?php

function validate_brand() {
    $valid = 1;

    if(empty($_POST["name"])) {
        $valid = 0;
        $_SESSION["message"]["name"] = "What brand is this?";
    }

    return $valid;
}

function brand_session_message($key) {
    if (isset($_SESSION["message"][$key])) {
        echo $_SESSION["message"][$key];
        unset($_SESSION["message"][$key]);
    }
}
