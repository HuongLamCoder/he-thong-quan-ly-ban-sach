<?php
session_start();
include_once "inc/client/header.php";

if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){   
        
        case 'signUp':
        case 'login':
            require 'controller/client/AuthenController.php';
            break;
            
        case 'signOut':
            session_destroy();
            header("Location:index.php?page=home");
            break;

        case 'forgotPassword':
        case 'show_OTPInputForm':
        case 'show_changePasswordForm':
            require 'controller/client/ForgotPasswordController.php';
            break;

        case 'orderHistory':
        case 'orderDetail':
        case 'customerInfo':
        case 'changePassword':
            require 'controller/client/CustomerInfoController.php';
            break;
            
        case 'home':
        case 'search':
        case 'productDetail':
        default:
            require "controller/client/HomeController.php";
            break;
    }
}
else header("Location:index.php?page=home");

include_once "inc/client/footer.php";

?>