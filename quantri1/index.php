<?php
// session_start();
include '../lib/connect.php';
include '../lib/session.php';
if(isset($_GET['page']) && ($_GET['page'] !== "")){
    if (in_array($_GET['page'], ['login', 'forgot_password', 'authentication_code', 'reset_password'])) {
        include 'inc/Header.php';
        switch(trim($_GET['page'])){
            case 'login':
                include './controller/Login.php';
                break;
            case 'forgot_password':
                include './controller/ForgotPassword.php';
                break;
            case 'authentication_code':
                include './controller/AuthenticationCode.php';
                break;
            case 'reset_password':
                include './controller/ResetPassword.php';
                break;
            default:
                header('Location: index.php?page=login');
                break;
        }
    } else {
        include 'inc/Navigation.php';
        switch(trim($_GET['page'])){
            case 'role':
                include './controller/Role.php';
                break;
            case 'account':
                include './controller/Account.php';
                break;
            case 'author':
                include './controller/Author.php';
                break;
            case 'category':
                include './controller/Category.php';
                break;
            case 'supplier':
                include './controller/Supplier.php';
                break;
            case 'discount':
                include './controller/Discount.php';
                break;
            case 'product':
                include './controller/Product.php';
                break;
            case 'order':
                include './controller/Order.php';
                break;
            case 'grn':
                include './controller/GoodsReceiveNote.php';
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
                header('Location: index.php?page=login');
                break;
        }
    }
}
else{ 
    header('Location: index.php?page=login');
}
?>