<?php
if(isset($_POST['action'])){
    require '../BaseController.php';
    require '../../model/Category.php';
}
else{
    require '../controller/BaseController.php';
    require '../model/Category.php';
}
    class CategoryController extends BaseController{
        private $category;

        function __construct()
        {
            $this->folder = 'quantri';
            $this->category = new Category();
        }

        function index(){
            $categories = Category::getAll();
            $this->render('Category', 'DM', array('paging' => $categories), true);
        }

        function add(){
            $this->category->setTenTL($_POST['category_name']);
            $this->category->setTrangthai(1);
            $req = $this->category->add();
            if($req) echo json_encode(array('btn'=>'add', 'success'=>true));
            else echo json_encode(array('btn'=>'add', 'success'=>false));
            exit;
        }

        function edit(){
            $category = Category::findByID($_POST['category_id']);
            echo json_encode($category==null ? null: $category->toArray());
            exit;
        }

        function update(){
            $idTL = $_POST['category_id'];
            $tenTL = $_POST['category_name'];
            $trangthai = isset($_POST['status']) ? 1 : 0;
            $this->category->nhap($idTL, $tenTL, $trangthai);
            $req = $this->category->update();
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
                
                case 'edit_data':
                    $this->edit();
                    break;

                case 'submit_btn_update':
                    $this->update();
                    break;
            }
        }
    }

    $categoryController = new CategoryController();
    if(!isset($_POST['action'])) $action = 'index';
    else $action = $_POST['action'];
    $categoryController->checkAction($action);
?>