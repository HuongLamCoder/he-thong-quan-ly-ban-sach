<?php
    function getAllAuthor(){
        $sql='SELECT * FROM tacgia';
        return getAll($sql);
    }

    function getAuthorByID($id){
        $sql = 'SELECT * FROM tacgia WHERE idTG='.$id;
        return getOne($sql);
    }

    function isAuthorExist($tenTG){
        $sql = 'SELECT idTG FROM tacgia WHERE tenTG= "'.$tenTG.'"';
        return getOne($sql)!=null;
    }

    function isAuthorExist_update($id, $tenTG){
        $sql = 'SELECT idTG FROM tacgia WHERE tenTG= "'.$tenTG.'" AND idTG != '.$id;
        return getOne($sql)!=null;
    }
    
    function addAuthor($tenTG) {
        $sql = 'INSERT INTO tacgia(tenTG, trangthai) VALUES ("'.$tenTG.'", 1)';
        insert($sql);
    }

    function editAuthor($idTG, $tenTG, $trangthai){
        $sql = 'UPDATE tacgia
                SET tenTG = "'.$tenTG.'", trangthai = '.$trangthai.'
                WHERE idTG = '.$idTG;
        edit($sql);
    }

    function getStatusAuthorByID($idTG){
        $sql = 'SELECT trangthai, tenTG FROM tacgia WHERE idTG='.$idTG;
        return getOne($sql);
    }
?>