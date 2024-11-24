<?php
if(isset($_POST['action'])){
    require '../BaseController.php';
    require '../../model/Supplier.php';
    require '../../model/Discount.php';
    require '../../model/Author.php';
    require '../../model/Category.php';
    require '../../model/Product.php';
}
else{
    require '../controller/BaseController.php';
    require '../model/Supplier.php';
    require '../model/Discount.php';
    require '../model/Author.php';
    require '../model/Category.php';
    require '../model/Product.php';
}
    class ProductController extends BaseController{
        private Product $product;
        private Category $category;
        private Author $author;
        private Supplier $supplier;
        private Discount $discount;

        function __construct()
        {
            $this->folder = 'quantri';
            $this->product = new Product();
            $this->discount = new Discount();
            $this->category = new Category();
            $this->supplier = new Supplier();
            $this->author = new Author();
        }

        function index(){
            $products = Product::getAll();
            $supplier = Supplier::getAllActive();
            $category = Category::getAllActive();
            $discount = Discount::getAllWaiting();
            $author = Author::getAllActive();
            $result = [
                'paging' => $products,
                'supplier' => $supplier,
                'category' => $category,
                'discount' => $discount,
                'author' => $author
            ];
            $this->render('Product', 'SP', $result, true);
        }

        function add(){
            // image
            $images = $_FILES['input_file']['name'];
            $tmp_dir = $_FILES['input_file']['tmp_name'];
            $imageSize = $_FILES['input_file']['size'];

            if($imageSize===0){
                $picProfile="blank-image.png";
            }
            else{
            $upload_dir='../../asset/uploads/';
            $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
            $picProfile = rand(1000, 1000000).'.'.$imgExt;
            move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
            }

            $tuasach = $_POST['product-name'];
            $nxb = $_POST['product-publisher'];
            $idNCC = $_POST['product-supplier'];
            $idTG = $_POST['idTG'];
            $idTL = $_POST['product-category'];
            $giabia = $_POST['product-original-price'];
            $namxb = $_POST['product-publish-year'];
            $mota = $_POST['product-description'];
            $trongluong = $_POST['product-weight'];
            $this->product->nhap($picProfile, $tuasach, $nxb, $idNCC, $idTL, $giabia, $namxb, 
            $mota, $trongluong, 1, $giabia);
            $req = $this->product->add();
            if($req) echo json_encode(array('btn'=>'add', 'success'=>true));
            else echo json_encode(array('btn'=>'add', 'success'=>false));
            exit;
        }

        function edit(){
            $product = Product::findByID($_POST['product_id']);
            echo json_encode($product==null ? null: $product->toArray());
            exit;
        }

        // function update(){
        //     $id = $_POST['discount_id'];
        //     $phantram = $_POST['discount-percent'];
        //     $ngaybatdau = $_POST['discount-date-start'];
        //     $ngayketthuc = $_POST['discount-date-end'];
        //     $trangthai = 'cdr';
        //     $this->discount->nhap($id,$phantram, $ngaybatdau, $ngayketthuc, $trangthai);
        //     $req = $this->discount->update();
        //     if($req) echo json_encode(array('btn'=>'update','success'=>true));
        //     else echo json_encode(array('btn'=>'update','success'=>false));
        //     exit;
        // }

        // function lock(){
        //     $this->discount->setIdMGG($_POST['discount_id']);
        //     $this->discount->setTrangthai('huy');
        //     $this->discount->lock();
        //     echo json_encode(array('success'=>true));
        //     exit;
        // }

        function checkAction($action){
            switch ($action){
                case 'index':
                    $this->index();
                    break;

                case 'submit_btn_add':
                    $this->add();
                    break;
                
                case 'edit_data':
                    $this->edit();
                    break;

                // case 'submit_btn_update':
                //     $this->update();
                //     break;
                
                // case 'lock_discount':
                //     $this->lock();
                //     break;
            }
        }
    }

    $productController = new ProductController();
    if(!isset($_POST['action'])) $action = 'index';
    else $action = $_POST['action'];
    $productController->checkAction($action);
?>