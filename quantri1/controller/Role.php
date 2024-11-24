<?php 
    // AJAX handle
    /* add-data */
    if(isset($_POST['submit_btn_add'])){
        include_once('../../lib/connect.php');
        include_once('../model/Role.php');
        $tenNQ = $_POST['tenNQ'];
        if(!isRoleExist($tenNQ)){
            addRole($tenNQ);
            $idNQ = getLastRoleID()['idNQ'];
            // get all the post except the first one 
            // which is the role_name
            $keys = array_keys($_POST);
            $n = count($keys)-1; // except 'btn_submit_add'
            for($i = 2; $i < $n; $i++) {
                $idCN = getIDPermissionByName($keys[$i])['idCN'];
                addRoleDetail($idNQ, $idCN);
            }
            echo json_encode(array('btn'=>'add', 'success'=>true));
        }
        else echo json_encode(array('btn'=>'add', 'success'=>false));
        exit;
    }
    /* add-data */

    /* view-data */
    if(isset($_POST['view_data'])){
        include_once('../../lib/connect.php');
        include_once('../model/Role.php');
        $role = getRoleByID($_POST['role_id']);
        $role_detail = getRoleDetail($_POST['role_id']);
        $result = array(
            'role' => $role,
            'role_detail' => $role_detail
        );
        echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        exit;
    }
    /* view-data */

    /*update-data*/
    if(isset($_POST['submit_btn_update'])){
        include_once('../../lib/connect.php');
        include_once('../model/Role.php');
        $tenNQ = $_POST['tenNQ'];
        $idNQ = $_POST['idNQ'];
        if(!isRoleExist_update($idNQ, $tenNQ)){
            // get all the post except the first one 
            // which is the role_name
            $keys = array_keys($_POST);
            $n = count($keys)-1; // except 'btn_submit_add'
            revokePermission($idNQ);
            for($i = 2; $i < $n; $i++) {
                $idCN = getIDPermissionByName($keys[$i])['idCN'];
                addRoleDetail($idNQ, $idCN);
            }
            updateRole($idNQ, $tenNQ);
            echo json_encode(array('btn'=>'add', 'success'=>true));
        }
        else echo json_encode(array('btn'=>'add', 'success'=>false));
        exit;
    }
    /*update-data*/

    /* lock-role */
    if(isset($_POST['lock_role'])){
        lockRole($_POST['role_id']);
        echo json_encode(array('btn'=>'add', 'success'=>true));
        exit;
    }
    /* lock-role */

    /* unlock-role */
    if(isset($_POST['unlock_role'])){
        unlockRole($_POST['role_id']);
        echo json_encode(array('btn'=>'add', 'success'=>true));
        exit;
    }
    /* unlock-role */

    include 'model/Role.php';
    $result = getAllRole();
    $pageTitle = 'role';
    include_once('./view/Role.php');
?>