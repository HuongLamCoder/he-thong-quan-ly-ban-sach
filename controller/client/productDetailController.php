<?php
    require __DIR__.'../controller/BaseController.php';
    require '../model/Supplier.php';
    require '../model/Discount.php';
    require '../model/Author.php';
    require '../model/Category.php';
    require '../model/Product.php';

class ProductController extends BaseController
{
    // Bỏ
    // private Product $product;

    function __construct()
    {
        $this->folder = 'quantri';
        // $this->product = new Product();
    }

    function index()
    {
        $products = Product::getAll();
        $this->render('Product', 'SP', $products, true);
    }

    function uploadImage($file, $upload_dir)
    {
        $img_name = basename($file["name"]);
        $img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $img_new_name = uniqid("SP_") . "." . $img_extension;
        $img_path = $upload_dir . $img_new_name;
        move_uploaded_file($file["tmp_name"], $img_path);
        return $img_new_name;
    }

    function add() {
        $hinhanh = $this->uploadImage($_FILES['product-img'], '../../asset/uploads/');
        $tuasach = $_POST['product-name'];
        $nxb = $_POST['product-publisher'];
        $idNCC = $_POST['product-supplier'];
        $idTG = explode(',', $_POST['product-authors']);
        $idTL = $_POST['product-category'];
        $giabia = $_POST['product-original-price'];
        $namxb = $_POST['product-publish-year'];
        $mota = $_POST['product-description'];
        $trongluong = $_POST['product-weight'];

        $product = new Product(
            0,
            $tuasach,
            $mota,
            0,
            0,
            $nxb,
            $namxb,
            $giabia,
            $giabia,
            1,
            $idNCC,
            $hinhanh,
            $trongluong,
            null,
            $idTG,
            $idTL
        );

        $req = $product->add();
        if ($req) 
            echo json_encode(array('btn' => 'add', 'success' => true));
        else 
            echo json_encode(array('btn' => 'add', 'success' => false));
        exit;
    }

    function getProductDetail()
    {
        $product = Product::getProductDetailByID($_POST['product_id']);
        if($product == null) 
            echo json_encode(array("status" => "fail"));
        else 
            echo json_encode(array("status" => "success", "data" => $product));
        exit;
    }

    function update() {
        $idSach = $_POST['product-id'];
        $upload_dir = '../../asset/uploads/';
        if ($_FILES['product-img']["size"] !== 0) {
            $old_image = Product::getProductImage($idSach);
            if (file_exists($upload_dir . $old_image)) {
                unlink($upload_dir . $old_image);
            }

            $hinhanh = $this->uploadImage($_FILES['product-img'], $upload_dir);
        } else {
            $hinhanh = Product::getProductImage($idSach);
        }

        $tuasach = $_POST['product-name'];
        $nxb = $_POST['product-publisher'];
        $idNCC = (int)$_POST['product-supplier'];
        $idTL = (int)$_POST['product-category'];
        $giabia = $_POST['product-original-price'];
        $idMGG = $_POST['product-discount'] == "" ? null : $_POST['product-discount'];
        $namxb = $_POST['product-publish-year'];
        $trangthai = isset($_POST['status']) ? 1 : 0;
        $mota = $_POST['product-description'];
        $trongluong = $_POST['product-weight'];

        $idTG = explode(',', $_POST['product-authors']);

        $product = new Product(
            $idSach,
            $tuasach,
            $mota,
            0,
            0,
            $nxb,
            $namxb,
            $giabia,
            $giabia,
            $trangthai,
            $idNCC,
            $hinhanh,
            $trongluong,
            $idMGG,
            $idTG,
            $idTL
        );

        $req = $product->update();
        if ($req) 
            echo json_encode(array('btn' => 'update', 'success' => true));
        else 
            echo json_encode(array('btn' => 'update', 'success' => false));
        exit;
    }

    function checkAction($action)
    {
        switch ($action) {
            case 'index':
                $this->index();
                break;
            case 'submit_btn_add':
                $this->add();
                break;
            case 'getProductDetail':
                $this->getProductDetail();
                break;
            case 'edit_data':
                $this->getProductDetail();
                break;
            case 'submit_btn_update':
                $this->update();
                break;
        }
    }
}

$productController = new ProductController();
if (!isset($_POST['action'])) $action = 'index';
else $action = $_POST['action'];
$productController->checkAction($action);