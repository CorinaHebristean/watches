<?php

include "header.php";

$brand = $_GET["brand"];

echo count_products_by_brand($brand);
