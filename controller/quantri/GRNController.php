<?php
if(isset($_POST['action'])){
    require '../BaseController.php';
    require '../../model/GRN.php';
    require '../../model/Supplier.php';
    require '../../model/Product.php';
    require '../../model/GRNDetail.php';
}
else{
    require '../controller/BaseController.php';
    require '../model/GRN.php';
    require '../model/Supplier.php';
    require '../model/Product.php';
    require '../model/GRNDetail.php';
}
    class GRNController extends BaseController{
        private GRN $grn;
        private GRNDetail $detail;
        private Supplier $supplier;

        function __construct()
        {
            $this->folder = 'quantri';
            $this->grn = new Grn();
            $this->supplier = new Supplier();
            $this->detail = new GRNDetail();
        }

        function index(){
            $grn = GRN::getAll();
            $supplier = Supplier::getAllActive();
            $result = [
                'paging' => $grn,
                'supplier' => $supplier
            ];
            $this->render('GoodsReceiveNote', 'PN', $result, true);
        }

        function openAddForm(){
            $product = Product::getAllBySupplier($_POST['supplier_id']);
            echo json_encode($product==null ? null: $product);
        }

        function add(){
            $ngaytao = $_POST['ngaytao'];
            $ngaycapnhat = $_POST['ngaycapnhat'];
            $chietkhau = $_POST['chietkhau'];
            $idNV = $_POST['idNV'];
            // tao moi phieu nhap kho
            $this->grn->setIdNV($idNV);
            $this->grn->addNewphieunhapkho();
            $idPN = GRN::getLastPhieuNhapKhoID();
            $this->grn->setIdPN($idPN);
            // so san pham
            $n = count($_POST['grn_product']);
            $tongtien = $_POST['tongtien'];
            $tongsoluong = 0;
            $dupplicateProduct = false;
            try {
            for($i=1; $i<=$n; $i++){
                $idSach = $_POST['grn_product'][$i-1];
                $soluong = $_POST['grn_quantity'][$i];
                $tongsoluong+=$soluong;
                $this->detail->nhap($idPN, $idSach, $soluong);
                $this->detail->addCTPhieuNhap();
            }
                $this->grn->nhapNew($ngaytao, $ngaycapnhat, $chietkhau, $tongsoluong, $tongtien, "cht");
                $this->grn->createPhieuNhapKho();
                echo json_encode(array('success'=>true));
        } catch (Exception $e) {
            echo json_encode(array(
                'success' => false,
                'message' => $e->getMessage(),
            ));
        }
        }

        function edit(){
            $grn = GRN::findByID($_POST['grn_id']);
            echo json_encode($grn==null ? null: $grn->toArray());
            exit;
        }

        // function edit(){
        //     $category = Category::findByID($_POST['category_id']);
        //     echo json_encode($category==null ? null: $category->toArray());
        //     exit;
        // }

        // function update(){
        //     $idTL = $_POST['category_id'];
        //     $tenTL = $_POST['category_name'];
        //     $trangthai = isset($_POST['status']) ? 1 : 0;
        //     $this->category->nhap($idTL, $tenTL, $trangthai);
        //     $req = $this->category->update();
        //     if($req) echo json_encode(array('btn'=>'update','success'=>true));
        //     else echo json_encode(array('btn'=>'update','success'=>false));
        //     exit;
        // }

        function checkAction($action){
            switch ($action){
                case 'index':
                    $this->index();
                    break;

                case 'openAddForm':
                    $this->openAddForm();
                    break;
                case 'submit_btn_add':
                    $this->add();
                    break;
                
                // case 'edit_data':
                //     $this->edit();
                //     break;

                // case 'submit_btn_update':
                //     $this->update();
                //     break;
            }
        }
    }

    $grnController = new GRNController();
    if(!isset($_POST['action'])) $action = 'index';
    else $action = $_POST['action'];
    $grnController->checkAction($action);
?>