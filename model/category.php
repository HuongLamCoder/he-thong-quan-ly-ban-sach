<?php
function getAllCategories(){
    $sql = 'SELECT * FROM theloai WHERE trangthai=1';
    return getAll($sql);
}
?>