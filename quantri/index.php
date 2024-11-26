<?php
session_start();
if(isset($_GET['page']) && ($_GET['page'] !== "")){
    if (in_array($_GET['page'], ['login', 'forgot_password', 'authentication_code', 'reset_password'])) {
        include '../inc/quantri/Header.php';
        switch(trim($_GET['page'])){
            case 'login':
                include '../controller/quantri/AuthenController.php';
                break;
            case 'forgotPassword':
                include '../controller/quantri/ForgotPasswordController.php';
                break;
            case 'show_OTPInputForm':
                include '../controller/quantri/ForgotPasswordController.php';
                break;
            case 'show_changePasswordForm':
                include '../controller/quantri/ForgotPasswordController.php';
                break;
            default:
                header( 'Location:index.php?page=login');
                break;
        }
    } else if(!isset($_SESSION['user']))
    header('Location:http://localhost/he-thong-quan-ly-ban-sach/quantri/index.php');
    else{
        include '../inc/quantri/Navigation.php';
        switch(trim($_GET['page'])){
            case 'role':
                include '../controller/quantri/RoleController.php';
                break;
            case 'account':
                include '../controller/quantri/AccountController.php';
                break;
            case 'author':
                include '../controller/quantri/AuthorController.php';
                break;
            case 'category':
                include '../controller/quantri/CategoryController.php';
                break;
            case 'supplier':
                include '../controller/quantri/SupplierController.php';
                break;
            case 'discount':
                include '../controller/quantri/DiscountController.php';
                break;
            case 'product':
                include '../controller/quantri/ProductController.php';
                break;
            case 'order':
                include './controller/Order.php';
                break;
            case 'grn':
                include '../controller/quantri/GoodsReceiveNote.php';
                break;
            case 'income':
                include './controller/Income.php';
                break;
            case 'cost':
                include './controller/Cost.php';
                break;
            case 'profit':
                include './controller/Profit.php';
                break;
            default:
                header('Location:index.php?page=login');
                break;
        }
    }
}
else{ 
    header('Location:index.php?page=login');
}
?>