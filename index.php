<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once "inc/client/header.php";
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
            require 'controller/client/AuthenController.php';
            break;

        case 'signUp_OTP':
            require 'controller/client/AuthenController.php';
            break;

        case 'login':
            require 'controller/client/AuthenController.php';
            break;
            
        case 'signOut':
            unset($_SESSION['user']);
            header("Location:index.php?page=home");
            break;

        case 'forgotPassword':
            require 'controller/client/ForgotPasswordController.php';
            break;

        case 'show_OTPInputForm':
            require 'controller/client/ForgotPasswordController.php';
            break;

        case 'show_changePasswordForm':
            require 'controller/client/ForgotPasswordController.php';
            break;

        case 'customerInfo':
            require 'controller/client/CustomerInfoController.php';
            break;

        default:
            require "controller/home.php";
            break;
    }
}
else{
    header("Location:index.php?page=home");
}
include_once "inc/client/footer.php"
?>