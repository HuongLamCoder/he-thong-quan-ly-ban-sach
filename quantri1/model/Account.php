<?php
    function getAllAccounts() {
        $sql = 'SELECT idTK, tenTK, email, dienthoai, tenNQ, taikhoan.trangthai AS trangthai FROM taikhoan 
        LEFT JOIN nhomquyen ON taikhoan.idNQ = nhomquyen.idNQ';
        return getAll($sql);
    }

    function getAccountByID($idTK) {
        $sql = 'SELECT * FROM taikhoan WHERE idTK = ' . $idTK;
        return getOne($sql);
    }

    function isAccountExist($email) {
        $sql = 'SELECT idTK FROM taikhoan WHERE email = "' . $email . '"';
        return getOne($sql) != null;
    }

    function isAccountExist_update($idTK, $email) {
        $sql = 'SELECT idTK FROM taikhoan WHERE email = "' . $email . '" AND idTK != ' . $idTK;
        return getOne($sql) != null;
    }

    function addAccount($tenTK, $email, $matkhau, $dienthoai, $trangthai, $idNQ) {
        $sql = 'INSERT INTO taikhoan (tenTK, email, matkhau, dienthoai, trangthai, idNQ) VALUES ("' . $tenTK . '", "' . $email . '", "' . $matkhau . '", "' . $dienthoai . '", "' . $trangthai . '", ' . $idNQ . ')';
        insert($sql);
    }

    function updateAccount($idTK, $tenTK, $dienthoai, $email, $trangthai, $idNQ) {
        $sql = 'UPDATE taikhoan 
                SET tenTK = "' . $tenTK . '", 
                    dienthoai = "' . $dienthoai . '", 
                    email = "' . $email . '",
                    trangthai = "' . $trangthai . '", 
                    idNQ = ' . $idNQ . ' 
                WHERE idTK = ' . $idTK;
        edit($sql);
    }

    function gettrangthaiAccountByidTK($idTK) {
        $sql = 'SELECT trangthai, tenTK FROM taikhoan WHERE idTK = ' . $idTK;
        return getOne($sql);
    }

?>