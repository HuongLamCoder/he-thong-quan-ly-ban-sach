<?php
session_start();
$_SESSION['user'] = ["idTK" => 1];
include_once "inc/header.php";
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){   
        case 'home':
            require 'controller/home.php';
            break;

        case 'productDetail':
            require "controller/client/productDetailController.php";
            break;

        case 'signUp':
            require 'controller/client/AuthenController.php';
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