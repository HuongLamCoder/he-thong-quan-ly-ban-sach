<?php
function getAllCategories() {
    $sql = 'SELECT * FROM theloai';
    return getAll($sql);
}

function isCategoryExist($tenTL){
    $tenTL = strtolower($tenTL);
    $sql = 'SELECT idTL FROM theloai WHERE tenTL= "'.$tenTL.'"';
   return getOne($sql)!=null;
}

function isCategoryExist_update($id, $tenTL){
    $sql = 'SELECT idTL FROM theloai WHERE tenTL= "'.$tenTL.'" AND idTL != '.$id;
    return getOne($sql)!=null;
}

function getCategoryById($id) {
    $sql = 'SELECT * FROM theloai WHERE idTL ='.$id;
    return getOne($sql);
}

function addCategory($tenTL) {
    $sql = 'INSERT INTO theloai (tenTL, trangthai) VALUES ("' . $tenTL . '", 1)';
    insert($sql);
}

function editCategory($idTL, $tenTL, $trangthai){
    $sql = 'UPDATE theloai
            SET tenTL = "'.$tenTL.'", trangthai = '.$trangthai.'
            WHERE idTL = '.$idTL;
    edit($sql);
}
?>