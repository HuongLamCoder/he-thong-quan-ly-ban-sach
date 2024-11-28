<?php
session_start();
include_once "inc/client/header.php";

if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){   
        
        case 'signUp':
        case 'login':
            require __DIR__ . '/controller/client/AuthenController.php';
            break;
            
        case 'signOut':
            session_destroy();
            header("Location:index.php?page=home");
            break;

        case 'forgotPassword':
        case 'show_OTPInputForm':
        case 'show_changePasswordForm':
            require __DIR__ . '/controller/client/ForgotPasswordController.php';
            break;

        case 'orderHistory':
        case 'orderDetail':
        case 'customerInfo':
        case 'changePassword':
            require __DIR__ . '/controller/client/CustomerInfoController.php';
            break;
        
        case 'checkout-address':
        case 'checkout':
        case 'checkout-submit':
            require __DIR__ . '/controller/client/CheckoutController.php';
            break;

        case 'home':
        case 'search':
        case 'productDetail':
        case 'cart':
        default:
            require __DIR__ . "/controller/client/HomeController.php";
            break;
    }
}
else header("Location:index.php?page=home");

include_once "inc/client/footer.php";

?>