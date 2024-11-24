<?php 
    /* open-add-data */
    if(isset($_POST['open_add'])){
        include_once('../../lib/connect.php');
        include_once('../model/Role.php');
        $result = getAllPermission();
        echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        exit;
    }
    /* open-add-data */

    /* add-data */
    if(isset($_POST['submit_btn_add'])){
        include_once('../../lib/connect.php');
        include_once('../model/Role.php');
        // kiem tra nhom quyen da ton tai
        $isRoleExist = isRoleExist($_POST['role_name'], $_POST['idCN'], $_POST['action']);
        if($isRoleExist!=''){
            addRole($_POST['role_name']);
            $idNQ = getLastRole()['idNQ'];
            $n = count($_POST['idCN']);
            for($i=0; $i<$n; $i++)
                addRoleDetail()
            echo json_encode(array('btn'=>'add', 'success'=>true));
        }
        else echo json_encode(array('btn'=>'add', 'success'=>false, 'msg'=>$isRoleExist));
        exit;
    }
    /* add-data */

    /* view-data */
    if(isset($_POST['view_data'])){
        
        include_once('../../lib/connect.php');
        include_once('../model/Role.php');
        $role = getRoleByID($_POST['role_id']);
        $permission = getAllPermission();
        $role_detail = getRoleDetailByID($_POST['role_id']);
        $result = array(
            'role_info' => $role,
            'role_detail' => $role_detail,
            'permission' => $permission
        );

        echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        exit;
    }
    /* view-data */

    include 'model/Role.php';
    $result = getAllRoles();
    $pageTitle = 'role';
    include_once('./view/Role.php');
?>