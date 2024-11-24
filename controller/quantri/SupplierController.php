<?php
if(isset($_POST['action'])){
    require '../BaseController.php';
    require '../../model/Supplier.php';
}
else{
    require '../controller/BaseController.php';
    require '../model/Supplier.php';
}
    class SupplierController extends BaseController{
        private $supplier;

        function __construct()
        {
            $this->folder = 'quantri';
            $this->supplier= new Supplier();
        }

        function index(){
            $suppliers = Supplier::getAll();
            $this->render('Supplier', 'NCC', $suppliers, true);
        }

        function add(){
            $this->supplier->setTenNCC($_POST['supplier_name']);
            $this->supplier->setEmail($_POST['supplier_email']);
            $this->supplier->setDienthoai($_POST['supplier_phone']);
            // convert address to store
            $this->supplier->setAddress($_POST['supplier_address'], $_POST['supplier_city'], $_POST['supplier_district'], $_POST['supplier_ward']);
            $this->supplier->setTrangthai(1);
            $req = $this->supplier->add();
            if($req) echo json_encode(array('btn'=>'add', 'success'=>true));
            else echo json_encode(array('btn'=>'add', 'success'=>false));
            exit;
        }

        function openEditForm(){
            $supplier = Supplier::findByID($_POST['supplier_id']);
            $result = [];
            if($supplier != null){
                $city = City::getAll();
                $district = District::getAllByCity($supplier->getIdTinh());
                $ward = Ward::getAllByDistrict($supplier->getIdQuan());
                $result = [
                    'success' => true,
                    'supplier' => $supplier->toArray(),
                    'city' => $city,
                    'district' => $district,
                    'ward' => $ward
                ];
            }
            else $result = [
                'success' => false,
                'msg' => 'Lỗi không tìm thấy dữ liệu'
            ];
            echo json_encode($result);
            exit;
        }

        function update(){
            $idNCC=$_POST['supplier_id'];
            $tenNCC = $_POST['supplier_name'];
            $email = $_POST['supplier_email'];
            $dienthoai = $_POST['supplier_phone'];
            $trangthai = isset($_POST['status']) ? 1 : 0;
            $this->supplier->nhap($idNCC, $tenNCC, $email, $dienthoai, $trangthai);
            $this->supplier->setAddress($_POST['supplier_address'], $_POST['supplier_city'], $_POST['supplier_district'], $_POST['supplier_ward']);
            $req = $this->supplier->update();
            if($req) echo json_encode(array('btn'=>'update','success'=>true));
            else echo json_encode(array('btn'=>'update','success'=>false));
            exit;
        }

        function checkAction($action){
            switch ($action){
                case 'index':
                    $this->index();
                    break;

                case 'submit_btn_add':
                    $this->add();
                    break;
                
                case 'open_edit_form':
                    $this->openEditForm();
                    break;
                // case 'edit_data':
                //     $this->edit();
                //     break;

                case 'submit_btn_update':
                    $this->update();
                    break;
            }
        }
    }

    $supplierController = new SupplierController();
    if(!isset($_POST['action'])) $action = 'index';
    else $action = $_POST['action'];
    $supplierController->checkAction($action);
?>