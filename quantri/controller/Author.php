<?php
    // AJAX handle
    /* add-data */
    if(isset($_POST['submit_btn_add'])){
        include_once('../../lib/connect.php');
        include_once('../model/Author.php');
        $tenTG = $_POST['author_name'];
        if(!isAuthorExist($tenTG)){
            addAuthor($tenTG);
            echo json_encode(array('btn'=>'add', 'success'=>true));
        }
        else echo json_encode(array('btn'=>'add', 'success'=>false));
        exit;
    }
    /* add-data */
    
    /* edit-data */
    if(isset($_POST['edit_data'])){
        include_once('../../lib/connect.php');
        include_once('../model/Author.php');
        $result = getAuthorByID($_POST['author_id']);
        echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        exit;
    }
    /* edit-data */
    
    /* update-data */
    if(isset($_POST['submit_btn_update'])){
        include_once('../../lib/connect.php');
        include_once('../model/Author.php');
        $idTG = $_POST['author_id'];
        $tenTG = $_POST['author_name'];
        $trangthai = isset($_POST['status']) ? 1 : 0;
        if(!isAuthorExist_update($idTG, $tenTG)){
            editAuthor($idTG, $tenTG, $trangthai);
            echo json_encode(array('btn'=>'update','success'=>true));
        } 
        else echo json_encode(array('btn'=>'update','success'=>false));
        exit;
    }

    // Controller
    include 'model/Author.php';
    $result = getAllAuthor();
    include_once('./view/Author.php');
?>