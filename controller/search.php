<?php
    if(isset($_GET['category'])){
        // best-seller
        if($_GET['category'] == 'bestseller'){
            $result = getAllBestSellers();
            $pageTitle = "&category=bestseller";
        }
        else if(isset($_GET['idTL'])){
        // category id
            $result = getAllBooksByCategory($_GET['idTL']);
            $pageTitle = "&category=".$_GET['category']."&idTL=".$_GET['idTL'];
        }
        $category = getAllCategories();
        if($result == null) require 'view/noFound.php';
        require 'view/timKiem.php';
    }
?>