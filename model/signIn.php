<?php
    function getAccount($email){
        $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
        return getOne($sql);
    }

    function checkLogin($email, $password){
        $account = getAccount($email);
        $msg = '';
        // Kiểm tra xem có tồn tại không?
        if(!empty($account)) {
            if($account['idNQ'] == 1){ //khach hang
                $db_password = $account['matkhau'];
                // So sánh mật khẩu nhập vào với mật khẩu trong cơ sở dữ liệu
                if (password_verify($password, $db_password)) {
                    if ($account['trangthai'] != 1) 
                        $msg = "Tài khoản của bạn đã bị khoá!";
                } else $msg = "Mật khẩu không chính xác!";
            } else $msg = "Tài khoản không có quyền truy cập!";
        } else $msg = "Tài khoản không tồn tại!";
        return $msg;
    }
?>