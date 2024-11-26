<?php
session_start();
$_SESSION['user'] = [
    'idTK' => 11,
    'tenTK' => 'Nguyễn Phạm Quỳnh Hương',
    'email' => 'huonglamcoder@email.com',
    'sdt' => '0123456789',
];
include_once "inc/client/header.php";

if (isset($_GET['page']) && ($_GET['page'] !== "")) {
    switch (trim($_GET['page'])) {
        case 'home':
        case 'search':
        case 'productDetail':
        case 'cart':
            require __DIR__ . '/controller/client/HomeController.php';
            break;

        case 'checkout-address':
        case 'checkout':
        case 'checkout-submit':
        require __DIR__ . '/controller/client/CheckoutController.php';
            break;

        case 'signUp':
            require 'controller/client/AuthenController.php';
            break;

        case 'signIn':
            require 'controller/client/AuthenController.php';
            break;

        case 'signOut':
            unset($_SESSION['user']);
            header("Location:index.php?page=home");
            break;
        case 'customerInfo':
            require 'controller/client/CustomerInfoController.php';
            break;
        default:
            require "controller/client/HomeController.php";
            break;
    }
} else {
    header("Location:index.php?page=home");
}

include_once "inc/client/footer.php";
