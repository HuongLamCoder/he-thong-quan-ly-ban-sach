<?php
session_start();
if(isset($_GET['page']) && ($_GET['page'] !== "")){
    if (in_array($_GET['page'], ['login', 'forgot_password', 'authentication_code', 'reset_password', 'logout'])) {
        include '../inc/quantri/Header.php';
        switch(trim($_GET['page'])){
            case 'login':
                if(isset($_SESSION)) session_destroy();
                include '../controller/quantri/AuthenController.php';
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
    } else if(!isset($_SESSION['user']))
    header('Location: http://localhost/he-thong-quan-ly-ban-sach/quantri/index.php');
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
                include '../controller/quantri/OrderController.php';
                break;
            case 'goodsreceivenote':
                include '../controller/quantri/GRNController.php';
                break;
            case 'income':
                include '../controller/quantri/IncomeController.php';
                break;
            case 'cost':
                include '../controller/quantri/CostController.php';
                break;
            case 'profit':
                include '../controller/quantri/ProfitController.php';
                break;
            case 'searchRole':
                include '../controller/quantri/RoleController.php';
                break;
            case 'searchAccount':
                include '../controller/quantri/AccountController.php';
                break;
            case 'searchCategory':
                include '../controller/quantri/CategoryController.php';
                break;
            case 'searchSupplier':
                include '../controller/quantri/SupplierController.php';
                break;
            case 'searchDiscount':
                include '../controller/quantri/DiscountController.php';
                break;
            case 'searchAuthor':
                include '../controller/quantri/AuthorController.php';
                break;
            case 'searchProduct':
                include '../controller/quantri/ProductController.php';
                break;

            default:
                header('Location: index.php?page=login');
                break;
        }
    }
}
else if(!isset($_GET['page']) && isset($_SESSION['user'])){
    $chucnang = $_SESSION['permission'][0];
    var_dump($chucnang['tenCN']);
    $page = explode("_", $chucnang['tenCN'])[0];
    switch($page){
        case 'NQ': $page = 'role'; break;
        case 'TK': $page = 'account'; break;
        case 'TG': $page = 'author'; break;
        case 'TL': $page = 'category'; break;
        case 'NCC': $page = 'supplier'; break;
        case 'MGG': $page = 'discount'; break;
        case 'SP': $page = 'product'; break;
        case 'DH': $page = 'order'; break;
        case 'DT': $page = 'income'; break;
        case 'NK': $page = 'cost'; break;
        case 'LN': $page = 'profit'; break;
    }
header('Location: http://localhost/he-thong-quan-ly-ban-sach/quantri/index.php?page='.$page);
}
else{ 
    header('Location: index.php?page=login');
}
?> 