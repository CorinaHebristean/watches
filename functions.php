<?php

//dropdown branduri si afisare in ordine alfabetica
function select_brand($watchBrand=''){
    $brands = ["ZIIIRO", "Skagen", "Fossil", "Bergstern"];
    asort($brands);
    foreach($brands as $brand){
        if($brand == $watchBrand){ //avem optiunea selectata
            echo "<option value='$brand' selected>$brand</option>";
        } else {
            echo "<option value='$brand'>$brand</option>" . "<br>";
        }
    }
}
//checkbox pentru selectare moneda
function select_currency($watchCurrency=''){
    $currencies = ["USD", "GBP", "LEI", "EURO"];
    foreach($currencies as $currency){
        if($currency == $watchCurrency){
            echo "<input type='radio' name='currency' value='$currency' checked>$currency<br>";
        } else {
            echo "<input type='radio' name='currency' value='$currency'>$currency<br>";
        }
    }
}

// Show session message 
function session_message($key) {
    if (isset($_SESSION["message"][$key])) {
        echo $_SESSION["message"][$key];
        unset($_SESSION["message"][$key]);
    }    
}

// Validate watch form
function validate_watch_form() {
    $valid = 1;

    if(empty($_POST["brand"]) ){
        $valid = 0;
        $_SESSION["message"]["brand"] = "What brand is this product?";
    }

    if(empty($_POST["title"])){
        $valid = 0;
        $_SESSION["message"]["title"] = "Don't forget about the title!";
    }

    if(empty($_POST["description"])){
        $valid = 0;
        $_SESSION["message"]["description"] = "Please describe the product.";
    }

    if(empty($_POST["price"])){
        $valid = 0;
        $_SESSION["message"]["price"] = "How much does this product cost?";
    }

    if(!isset($_POST["currency"])){
        $valid = 0;
        $_SESSION["message"]["currency"] = "Don't forget to select the currency!";
    }

    if(empty($_POST["stock"])){
        $valid = 0;
        $_SESSION["message"]["stock"] = "How many products are available?";
    }

    return $valid;
}