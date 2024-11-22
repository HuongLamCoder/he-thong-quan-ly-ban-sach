<?php 
require "Product.php";
require "../config/config.php";
require "../lib/Database.php";
    echo "<pre>";
    print_r(Product::getProductDetailByID(10));
?>

