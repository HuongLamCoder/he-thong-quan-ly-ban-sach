<?php
// AJAX handle

/* update status daily */
if(isset($_POST['update_status'])){
    include_once('../../lib/connect.php');
    include_once('../model/Discount.php');
    $discount_id = $_POST['discount_id'];
    $status = $_POST['status'];
    updateDiscountStatus($discount_id, $status);
    echo json_encode(array('success'=>true));
    exit;
}
/* update status daily */

/* add-data */
if(isset($_POST['submit_btn_add'])){
    include_once('../../lib/connect.php');
    include_once('../model/Discount.php');
    $phantram = $_POST['discount-percent'];
    $ngaybatdau = $_POST['discount-date-start'];
    $ngayketthuc = $_POST['discount-date-end'];
    if(!isDiscountExist($phantram, $ngaybatdau, $ngayketthuc)){
        addDiscount($phantram, $ngaybatdau, $ngayketthuc, "cdr");
        echo json_encode(array('btn'=>'add', 'success'=>true));
    }
    else echo json_encode(array('btn'=>'add', 'success'=>false));
    exit;
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data'])){
    include_once('../../lib/connect.php');
    include_once('../model/Discount.php');
    $result = getDiscountByID($_POST['discount_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    exit;
}
/* edit-data */

/* update-data */
if(isset($_POST['submit_btn_update'])){
    include_once('../../lib/connect.php');
    include_once('../model/Discount.php');
    $id = $_POST['discount_id'];
    $phantram = $_POST['discount-percent'];
    $ngaybatdau = $_POST['discount-date-start'];
    $ngayketthuc = $_POST['discount-date-end'];
    if(!isDiscountExist($phantram, $ngaybatdau, $ngayketthuc)){
        editDiscount($id,$phantram, $ngaybatdau, $ngayketthuc, "cdr");
        echo json_encode(array('btn'=>'update', 'success'=>true));
    }
    else echo json_encode(array('btn'=>'update', 'success'=>false));
    exit;
}
/* update-data */

/* lock-data */
if(isset($_POST['lock_discount'])){
    include_once('../../lib/connect.php');
    include_once('../model/Discount.php');
    lockDiscount($_POST['discount_id']);
    echo json_encode(array('success'=>true));
    exit;
}
/* lock-data */

// Controller
include './model/Discount.php';
$result = getAllDiscount();
$pageTitle = 'discount';
include_once('./view/Discount.php');

?>