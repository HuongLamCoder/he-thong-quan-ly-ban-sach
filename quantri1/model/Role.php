<?php
function getAllRole(){
    $sql = 'SELECT * FROM nhomquyen';
    return getAll($sql);
}

function isRoleExist($tenNQ){
    $sql = 'SELECT * FROM nhomquyen WHERE tenNQ = "'.$tenNQ.'"';
    return getOne($sql);
}

function isRoleExist_update($idNQ, $tenNQ){
    $sql = 'SELECT * FROM nhomquyen WHERE tenNQ = "'.$tenNQ.'" AND idNQ!='.$idNQ;
    return getOne($sql);
}

function addRole($tenNQ){
    $sql = 'INSERT INTO nhomquyen(tenNQ, trangthai) VALUE("'.$tenNQ.'", 1)';
    insert($sql);
}

function getLastRoleID(){
    $sql = 
    'SELECT idNQ
    FROM nhomquyen
    ORDER BY idNQ DESC
    LIMIT 1';
    return getOne($sql);
}

function getIDPermissionByName($tenCN){
    $sql = 'SELECT idCN FROM chucnang WHERE tenCN ="'.$tenCN.'"';
    return getOne($sql);
}

function addRoleDetail($idNQ, $idCN){
    $sql = 'INSERT INTO ctnhomquyen(idNQ, idCN) VALUE('.$idNQ.','.$idCN.')';
    insert($sql);
}

function getRoleByID($idNQ){
    $sql = 'SELECT * FROM nhomquyen WHERE idNQ='.$idNQ;
    return getOne($sql);
}

function getRoleDetail($idNQ){
    $sql = 'SELECT * FROM ctnhomquyen
    INNER JOIN chucnang ON ctnhomquyen.idCN = chucnang.idCN
    WHERE idNQ='.$idNQ;
    return getAll($sql);
}

function revokePermission($idNQ){
    $sql = 'DELETE FROM ctnhomquyen WHERE idNQ ='.$idNQ;
    delete($sql);
}

function updateRole($idNQ, $tenNQ){
    $sql = 'UPDATE nhomquyen SET tenNQ = "'.$tenNQ.'" WHERE idNQ ='.$idNQ;
    edit($sql);
}

function lockRole($idNQ){
    $sql = 'UPDATE nhomquyen SET trangthai = 0 WHERE idNQ='.$idNQ;
    edit($sql);
}

function unlockRole($idNQ){
    $sql = 'UPDATE nhomquyen SET trangthai = 1 WHERE idNQ='.$idNQ;
    edit($sql);
}
?>