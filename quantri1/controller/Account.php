<?php 
// class account{
//     them(){
        
//     }
//     sua()
//     checkaction($request){

//     }

// }


if (isset($_POST['submit_btn_add'])) {
    include_once('../../lib/connect.php');
    include_once('../model/Account.php');
    
    $fullName = $_POST['username'];
    $email = $_POST['usermail'];
    $password = $_POST['password'];
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $phone = $_POST['userphone'];
    $role = $_POST['role-select'];
    $status = isset($_POST['status']) ? 1 : 0; // 1 = Đang hoạt động, 0 = Bị khóa

    if (!isAccountExist($email)) {
        addAccount($fullName, $email, $hashPassword, $phone, $status, $role);
        echo json_encode(array('btn' => 'add', 'success' => true));
    } else {
        echo json_encode(array('btn' => 'add', 'success' => false));
    }
    exit;
}
/* add-data */

/* edit-data */
if (isset($_POST['edit_data'])) {
    include_once('../../lib/connect.php');
    include_once('../model/Account.php');
    
    $result = getAccountByID($_POST['account_id']);
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}
/* edit-data */

/* update-data */
if (isset($_POST['submit_btn_update'])) {
    include_once('../../lib/connect.php');
    include_once('../model/Account.php');

    $id = $_POST['account_id'];
    $fullName = $_POST['username'];
    $email = $_POST['usermail'];
    $phone = $_POST['userphone'];
    $role = $_POST['role-select'];
    $status = isset($_POST['status']) ? 1 : 0;

    if (!isAccountExist_update($id, $email)) {
        updateAccount($id, $fullName, $phone, $email, $status, $role);
        echo json_encode(array('btn' => 'update', 'success' => true));
    } else {
        echo json_encode(array('btn' => 'update', 'success' => false));
    }
    exit;
}
/* update-data */

// Controller
include 'model/Account.php';
include 'model/Role.php';
$result = getAllAccounts();
$nq = getAllRole();
$pageTitle = 'account';
include 'view/Account.php';
?>