<?php
    // add
    if(isset($_POST['submit_btn_add'])){
        include_once('../../lib/connect.php');
        include_once('../model/Category.php');
        $tenTL = $_POST['category_name'];
        if(!isCategoryExist($tenTL)){
            addCategory($tenTL);
            echo json_encode(array('btn'=>'add', 'success'=>true));
        }
        else echo json_encode(array('btn'=>'add', 'success'=>false));
        exit;
    }

    //edit
    if(isset($_POST['edit_data'])){
        include_once('../../lib/connect.php');
        include_once('../model/Category.php');
        $result = getCategoryById($_POST['category_id']);
        echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        exit;
    }

    //update
    if(isset($_POST['submit_btn_update'])){
        include_once('../../lib/connect.php');
        include_once('../model/Category.php');
        $idDM = $_POST['category_id'];
        $tenDM = $_POST['category_name'];
        $trangthai = isset($_POST['status']) ? 1 : 0;
        if(!isCategoryExist_update($idDM, $tenDM)){
            editCategory($idDM, $tenDM, $trangthai);
            echo json_encode(array('btn'=>'update','success'=>true));
        } 
        else echo json_encode(array('btn'=>'update','success'=>false));
        exit;
    }
    include 'model/Category.php';
    $result = getAllCategories();
    $pageTitle = 'category';
    include_once('./view/Category.php');
?>