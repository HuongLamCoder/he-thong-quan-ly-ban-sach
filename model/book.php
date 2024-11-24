<?php
function getBestSellers(){
    $sql='SELECT * FROM sach
    WHERE tonkho > 0
    AND luotban > 0
    AND trangthai = 1
    ORDER BY luotban DESC
    LIMIT 5';
    return getAll($sql);
}

function getAllBestSellers(){
    $sql='SELECT * FROM sach
    WHERE tonkho > 0
    AND luotban > 0
    AND trangthai = 1
    ORDER BY luotban DESC';
    return getAll($sql);
}

function getBooksByCategory($idTL){
    $sql = 'SELECT * FROM sach
    WHERE tonkho > 0
    AND trangthai = 1
    AND idTL = '.$idTL.'
    ORDER BY luotban DESC 
    LIMIT 4';
    return getAll($sql);
}

function getAllBooksByCategory($idTL){
    $sql = 'SELECT * FROM sach
    WHERE tonkho > 0
    AND trangthai = 1
    AND idTL = '.$idTL.'
    ORDER BY luotban DESC';
    return getAll($sql);
}

function getBookByID($idSach){
    $sql = 'SELECT * 
    FROM sach INNER JOIN theloai ON sach.idTL = theloai.idTL
    WHERE tonkho > 0
    AND sach.trangthai = 1
    AND idSach = '.$idSach;
    return getOne($sql);
}

function searchBook($kyw){
    $sql='SELECT DISTINCT sach.idSach, hinhanh, tuasach, luotban, giaban, giabia
    FROM sach INNER JOIN sach_tacgia ON sach.idSach = sach_tacgia.idTG
    INNER JOIN tacgia ON sach_tacgia.idTG = tacgia.idTG
    WHERE tonkho > 0
    AND trangthai = 1
    AND (tuasach like "%'.$kyw.'%"
    OR tenTG like "%'.$kyw.'%")
    order by luotban DESC';
    return getAll($sql);
}

?>