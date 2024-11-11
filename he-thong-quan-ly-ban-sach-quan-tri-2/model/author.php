<?php
    function getAuthorsByIdSach($idSach){
        $sql = 'SELECT idSach, GROUP_CONCAT(tenTG SEPARATOR ", ") AS tenTG
        FROM sach_tacgia INNER JOIN tacgia ON sach_tacgia.idTG = tacgia.idTG
        WHERE idSach = '.$idSach.'
        GROUP BY idSach';
        return getOne($sql);
    }
?>