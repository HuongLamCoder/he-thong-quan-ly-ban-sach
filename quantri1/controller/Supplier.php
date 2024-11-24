<?php
    
    // AJAX handle
    /* district data */
    if(isset($_POST['district_data'])){
        include_once('../../lib/connect.php');
        include_once('../model/Address.php');
        $districts = getAllDistrict($_POST['province_id']);
        echo json_encode($districts,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        exit;
    }
    /* district data */

    /* ward data */
    if(isset($_POST['ward_data'])){
        include_once('../../lib/connect.php');
        include_once('../model/Address.php');
        $wards = getAllWard($_POST['district_id']);
        echo json_encode($wards,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        exit;
    }
    /* ward data */

    /* add-data */
    if (isset($_POST['submit_btn_add'])) {
        include_once('../../lib/connect.php');
        include_once('../model/Address.php');
        include_once('../model/Supplier.php');
        $ten = $_POST['supplier_name'];
        $email = $_POST['supplier_email'];
        $dienthoai = $_POST['supplier_phone'];
        // Get location names based on IDs
        $tinh = getProvinceNameById($_POST['supplier_city']);
        $quan = getDistrictNameById($_POST['supplier_district']);
        $xaphuong = getWardNameById($_POST['supplier_ward']);
    
        // Process address format
        $commaPos = strpos($_POST['supplier_address'], ',');
        $substring = ($commaPos !== false) ? substr($_POST['supplier_address'], 0, $commaPos) : $_POST['supplier_address'];
        $diachi = $substring.','.$xaphuong.','.$quan.','.$tinh;
    
        // Check if supplier exists
        if (!isSupplierExist($ten, $email, $dienthoai, $diachi)) {
            addSupplier($ten, $email, $dienthoai, $diachi);
            echo json_encode(array('btn'=>'add', 'success'=>true));
        } else {
            echo json_encode(array('btn'=>'add', 'success'=>false));
        }
        exit;
    }
    
    // Default response in case no conditions were met
  
    
    /* add-data */
    
    /* View */
   
    if(isset($_POST['view_data_supplier'])){
        include_once('../../lib/connect.php');
        include_once('../model/Supplier.php');
        $result = getSupplierByID($_POST['supplier_id']);
        echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        exit;
    }
   

    
/* edit-data */
if(isset($_POST['edit_data_supplier'])){
    include_once('../../lib/connect.php');
    include_once('../model/Supplier.php');
    include_once('../model/Address.php');
    $supplier = getSupplierByID($_POST['supplier_id']);
    $diachi = explode(",", $supplier['diachi']);
    $idTinh = getIdTinh($diachi[3])['idTinh'];
    $idQuan = getIdQuan($diachi[2], (int)$idTinh)['idQuan'];
    $idXa = getIdXa($diachi[1], (int)$idQuan)['idXa'];
    $sonha = $diachi[0];
    $tinh = getAllProvince();
    $quan = getAllDistrictByProvince((int)$idTinh);
    $xa = getAllWardByDistrict((int)$idQuan);
    $result = array(
        "supplier" => $supplier,
        "idTinh" => $idTinh,
        "idQuan" => $idQuan,
        "idXa" => $idXa,
        "sonha" => $sonha,
        "tinh" => $tinh,
        "quan" => $quan,
        "xa" => $xa,
    );
    echo json_encode($result);
    exit;
}


    
    /* update-data */
    if (isset($_POST['submit_btn_update'])) {
        include_once('../../lib/connect.php');
        include_once('../model/Address.php');
        include_once('../model/Supplier.php');
        $idNCC=$_POST['supplier_id'];
        $ten = $_POST['supplier_name'];
        $email = $_POST['supplier_email'];
        $dienthoai = $_POST['supplier_phone'];
        // Get location names based on IDs
        $tinh = getProvinceNameById($_POST['supplier_city']);
        $quan = getDistrictNameById($_POST['supplier_district']);
        $xaphuong = getWardNameById($_POST['supplier_ward']);
    
        // Process address format
        $commaPos = strpos($_POST['supplier_address'], ',');
        $substring = ($commaPos !== false) ? substr($_POST['supplier_address'], 0, $commaPos) : $_POST['supplier_address'];
        $diachi = $substring.','.$xaphuong.','.$quan.','.$tinh;

        $status = isset($_POST['status']) ? 1 : 0;
        // Check if supplier exists
        if (!isSupplierExist_update($ten, $email, $dienthoai,$idNCC)) {
            updateSupplier($idNCC,$ten, $email, $dienthoai, $diachi,$status);
            echo json_encode(array('btn'=>'edit', 'success'=>true));
        } else {
            echo json_encode(array('btn'=>'edit', 'success'=>false));
        }
        exit;
    }
        
    

    // Controller
    include 'model/Supplier.php';
    include 'model/Address.php';
    $result = getAllSupplier();
    $pageTitle = 'supplier';
    $provinces = getAllProvince();
    include_once('./view/Supplier.php');
?>