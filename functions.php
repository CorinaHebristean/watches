<?php

function is_loggedin() {
    if (isset($_SESSION["logged_in"]) && 
        $_SESSION["logged_in"] == 1) {
            return true;
        } 

    return false;
}

//dropdown branduri si afisare in ordine alfabetica
function select_brand($watchBrand=''){
    global $conn;

    $sql = "SELECT * FROM watches_brand
            ORDER BY name ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $watches_brand = $stmt->fetchAll();

    foreach($watches_brand as $brand){
        //var_dump($brand);
        //exit;

        if($brand["name"] == $watchBrand){ //avem optiunea selectata
            echo "<option value='" . $brand["name"] . "' selected>" . $brand["name"] . "</option>";
        } else {
            echo "<option value='" . $brand["name"] . "'>" . $brand["name"] . "</option>";
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

//Validate brand form
function validate_brand() {
    $valid = 1;

    if (empty($_POST["brand_name"])) {
        $valid = 0;
        $_SESSION["message"]["brand_name"] = "What brand is this?";
    }

    return $valid;
}

/*
function value_validation($key) {
    if (!empty($_POST[$key])) {
        echo "value=" . $_SESSION[$key]; 
        unset($_SESSION[$key]); 
    }
}
*/

//count models
// function count_models($key) { 
//     if (count($key) < 2) {
//         echo count($key) . " " . "model";
//     } else {
//         echo count($key) . " " . "models";
//     }
// }

function count_models($key) 
{ 
    echo count($key) . " ";
    echo (count($key) < 2) ? "model" : "models";
}

function count_products_by_brand($brand)
{
	global $conn;
	
	$sql = "SELECT * FROM watches
			WHERE brand = '$brand'";

	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$watches = $stmt->fetchAll();

	return count($watches) ;
}

// calculeaza totalul

function calculate_total() 
{
    $cart = $_SESSION["cart"];

    $total = 0;
    foreach ($cart as $product){
        $subtotal = $product["price"] * $product["q"];
        $total = $total + $subtotal;
    }

    return $total;
}

//calculeaza produsele din cos
function count_cart_products()
{
    $cart = $_SESSION["cart"];
    $count = count($cart);

    if ($count == 1) {
        echo $count . " " . "product";
    } else {
        echo $count . " " . "products";
    }
}
