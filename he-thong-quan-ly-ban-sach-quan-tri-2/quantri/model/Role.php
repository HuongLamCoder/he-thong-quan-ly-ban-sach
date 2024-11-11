<?php
    function getAllRoles() {
        $sql = 'SELECT * FROM nhomquyen';
        return getAll($sql);
    }
?>