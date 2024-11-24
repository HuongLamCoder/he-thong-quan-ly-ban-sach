<?php 
    if(isset($_POST['login'])){
        include_once('../../lib/connect.php');
        include_once('../model/Login.php');
        include_once('../../lib/session.php');

        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Kiểm tra thông tin đăng nhập
        $msg = checkLogin($email, $password);
        if($msg==''){
            $account = getAccount($email);
            $permission = getPermissionByAccountID($account['idNQ']);
            login_session($account['idTK'], $account['email'], $account['tenTK'], $account['idNQ']);
            permission_session($permission);
            echo json_encode(array('success'=>true, 'chucnang'=>$permission[0]['tenCN']));
        }
        else echo json_encode(array('success'=>false, 'msg'=>$msg));
        exit;
    }
    include_once('./view/Login.php');
?>