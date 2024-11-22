<?php
    if(isset($_GET['category'])){
        // best-seller
        if($_GET['category'] == 'bestseller'){
            $result = getAllBestSellers();
            $pageTitle = "&category=bestseller";
            $title = 'Sách bán chạy';
        }
        else if(isset($_GET['idTL'])){
        // category id
            $result = getAllBooksByCategory($_GET['idTL']);
            $pageTitle = "&category=".$_GET['category']."&idTL=".$_GET['idTL'];
            $title = $_GET['category'];
        }
        $category = getAllCategories();
        require 'view/timKiem.php';
    }

    if(isset($_GET['kyw'])){
        $kyw = $_GET['kyw'];
        if($kyw != ""){
            $result = searchBook($kyw);
            $pageTitle = "&kyw=".$kyw;
            $title = $kyw;

            $category = getAllCategories();
            require 'view/timKiem.php';
        }
        else header('Location: ?page=home');
    }

?>