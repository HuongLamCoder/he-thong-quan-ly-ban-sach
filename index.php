<?php
require 'lib/connect.php';
require 'model/book.php';
require 'model/category.php';
require 'model/author.php';

include_once "inc/header.php";
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
        
        case 'signUp':
            require 'controller/signUp.php';
            break;

        case 'signIn':
            require 'controller/signIn.php';
            break;
            
        default:
            require "controller/home.php";
            break;
    }
}
else{
    header("Location:index.php?page=home");
}

?>