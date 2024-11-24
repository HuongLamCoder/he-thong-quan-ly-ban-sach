<?php
    function checkEmailIsExist($email){
        $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
        return getOne($sql) != null;
    } 

    function insertNewAccount($fullname, $email, $phoneNumber, $password){
        $hashedPassword = password_hash($password, algo: PASSWORD_DEFAULT);
        $sql = "INSERT INTO taikhoan (tenTK, email, dienthoai, matkhau, trangthai)
            VALUES ('$fullname', '$email', '$phoneNumber', '$hashedPassword', 1)";
        insert($sql);
    }
?>