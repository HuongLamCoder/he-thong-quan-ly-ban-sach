<?php
require 'lib/connect.php';
require 'model/book.php';
require 'model/category.php';
require 'model/author.php';

if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){   
        case 'home':
            require 'controller/home.php';
            break;

        case 'productDetail':
            require "controller/productDetail.php";
            break;

        case 'search':
            require 'controller/search.php';
            break;

        default:
            require "controller/productDetail.php";
            break;
    }
}
else{
    header("Location:index.php?page=home");
}

?>