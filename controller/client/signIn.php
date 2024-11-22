<?php

    // Kiểm tra nếu có dữ liệu được gửi từ Ajax
    if (isset($_POST['email']) && isset($_POST['password'])) {
        include_once('../lib/connect.php');
        include_once('../model/signIn.php');
        include_once('../lib/session.php');

        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Kiểm tra thông tin đăng nhập
        $msg = checkLogin($email, $password);
        if ($msg=='') {
            $account = getAccount($email);
            login_session($account['idTK'], $account['email'], $account['tenTK'], $account['idNQ']);
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false, 'msg'=>$msg));
        exit;
    }

    require_once("view/signIn.php")
?>