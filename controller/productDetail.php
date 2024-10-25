<?php
    if(isset($_GET['idSach'])){
        $book = getBookByID($_GET['idSach']);
        if($book == null){
            echo '<script>alert("Sản phẩm không tồn tại")</script>';
            header('Location: ?page=home');
        }
        else {
            $authors = getAuthorsByIdSach($_GET['idSach']);
            require 'view/chiTietSanPham.php';
        }
    }
?>