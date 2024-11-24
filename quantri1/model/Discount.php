<?php
    function getAllDiscount(){
        $sql='SELECT * FROM magiamgia';
        return getAll($sql);
    }

    function getAllDiscountWaiting(){
        $sql = 'SELECT * FROM magiamgia WHERE trangthai = "cdr"';
        return getAll($sql);
    }

    function getAllDiscountActive(){
        $sql='SELECT * FROM magiamgia WHERE trangthai = "cdr"';
        return getAll($sql);
    }

    function getDiscountByID($idMGG){
        $sql = 'SELECT * FROM magiamgia WHERE idMGG='.$idMGG;
        return getOne($sql);
    }

    function getDiscountName($id){
        $sql = 'SELECT phantram FROM magiamgia WHERE idMGG='.$id;
        return getOne($sql);
    }

    function isDiscountExist($phantram, $ngaybatdau, $ngayketthuc){
        $sql = 'SELECT idMGG FROM magiamgia WHERE phantram= '.$phantram.' AND ngaybatdau= "'.$ngaybatdau.'" AND ngayketthuc= "'.$ngayketthuc.'" AND trangthai!="huy"';
       return getOne($sql)!=null;
    }
    
    function addDiscount($phantram, $ngaybatdau, $ngayketthuc, $trangthai){
        $sql='insert into magiamgia(phantram, ngaybatdau, ngayketthuc, trangthai) values ('.$phantram.',"'.$ngaybatdau.'","'.$ngayketthuc.'","'.$trangthai.'")';
        insert($sql);
    }

    function editDiscount($idMGG,$phantram, $ngaybatdau, $ngayketthuc, $trangthai){
        $sql = 
        'UPDATE magiamgia 
        SET phantram = '.$phantram.',
        ngaybatdau = "'.$ngaybatdau.'",
        ngayketthuc = "'.$ngayketthuc.'",
        trangthai = "'.$trangthai.'"
        WHERE idMGG = '.$idMGG;
        edit($sql);
    }

    function lockDiscount($idMGG){
        $sql = 
        'UPDATE magiamgia 
        SET trangthai = "huy"
        WHERE idMGG = '.$idMGG;
        edit($sql);
    }

    function updateDiscountStatus($idMGG, $trangthai) {
        $sql = 
        'UPDATE magiamgia 
        SET trangthai = "'.$trangthai.'"
        WHERE idMGG = '.$idMGG;
        edit($sql);
    }
?>