<?php
    if (isset($_POST['fullname']) &&
    isset($_POST['email']) &&
    isset($_POST['phoneNumber']) &&
    isset($_POST['password'])
    ) {
        include_once('../lib/connect.php');
        include_once('../model/signUp.php');

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];
        if(!checkEmailIsExist($email)){
            $registerResult = insertNewAccount($fullname, $email, $phoneNumber, $password);
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false));
        exit;
    }

    require_once ("view/signUp.php");
?>