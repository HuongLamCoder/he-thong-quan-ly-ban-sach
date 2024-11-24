<?php
    function getAllRoles(){
        $sql = 'SELECT * FROM nhomquyen';
        return getAll($sql);
    }

    function getAllPermission(){
        $sql = 'SELECT * FROM chucnang ORDER BY idCN';
        return getAll($sql);
    }

    function getRoleByID($idNQ){
        $sql = 'SELECT * FROM nhomquyen WHERE idNQ='.$idNQ;
        return getOne($sql);
    }

    function getRoleDetailByID($idNQ){
        $sql = 'SELECT * FROM ctnhomquyen
        WHERE idNQ='.$idNQ.'
        ORDER BY idCN';
        return getAll($sql);
    }
    
    function isRoleExist($tenNQ, $idCN, $action){
        $msg = '';
        // kiem tra ten nhom quyen da ton tai
        $sql = 'SELECT * FROM nhomquyen WHERE tenNQ LIKE "%'.$tenNQ.'%"';
        if(getOne($sql)!=null) $msg = 'Tên nhóm quyền đã tồn tại';
        return $msg;
    }

    function addRole($tenNQ)
?>