<?php
    function getAllAccounts() {
        $sql = 'SELECT * 
                FROM taikhoan join nhomquyen on taikhoan.idNQ = nhomquyen.idNQ' ;
        return getAll($sql);
    }

    function getAccountByID($idTK) {
        $sql = 'SELECT * FROM taikhoan WHERE idTK = ' . $idTK;
        return getOne($sql);
    }

    function isAccountExist($tenTK) {
        $sql = 'SELECT idTK FROM taikhoan WHERE tenTK = "' . $tenTK . '"';
        return getOne($sql) != null;
    }

    function isAccountExist_update($idTK, $tenTK) {
        $sql = 'SELECT idTK FROM taikhoan WHERE tenTK = "' . $tenTK . '" AND idTK != ' . $idTK;
        return getOne($sql) != null;
    }

    function addAccount($tenTK, $email, $matkhau, $dienthoai, $trangthai, $idNQ) {
        $sql = 'INSERT INTO taikhoan (tenTK, email, matkhau, dienthoai, trangthai, idNQ) VALUES ("' . $tenTK . '", "' . $email . '", "' . $matkhau . '", "' . $dienthoai . '", "' . $trangthai . '", ' . $idNQ . ')';
        insert($sql);
    }

    function updateAccount($idTK, $tenTK, $dienthoai, $email, $matkhau, $trangthai, $idNQ) {
        $sql = 'UPDATE taikhoan 
                SET tenTK = "' . $tenTK . '", 
                    dienthoai = "' . $dienthoai . '", 
                    email = "' . $email . '", 
                    matkhau = "' . $matkhau . '", 
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