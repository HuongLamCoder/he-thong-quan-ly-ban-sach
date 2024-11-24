<?php
if(isset($_POST['action'])){
    require '../BaseController.php';
    require '../../model/Author.php';
}
else{
    require '../controller/BaseController.php';
    require '../model/Author.php';
}
    class AuthorController extends BaseController{
        private $author;

        function __construct()
        {
            $this->folder = 'quantri';
            $this->author= new Author();
        }

        function index(){
            $authors = Author::getAll();
            $this->render('Author','TG', array('paging' => $authors), true);
        }

        function add(){
            $this->author->setTenTG($_POST['author_name']);
            $this->author->setTrangthai(1);
            $req = $this->author->add();
            if($req) echo json_encode(array('btn'=>'add', 'success'=>true));
            else echo json_encode(array('btn'=>'add', 'success'=>false));
            exit;
        }

        function edit(){
            $author = Author::findByID($_POST['author_id']);
            echo json_encode($author==null ? null: $author->toArray());
            exit;
        }

        function update(){
            $idTG = $_POST['author_id'];
            $tenTG = $_POST['author_name'];
            $trangthai = isset($_POST['status']) ? 1 : 0;
            $this->author->nhap($idTG, $tenTG, $trangthai);
            $req = $this->author->update();
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

    $authorController = new AuthorController();
    if(!isset($_POST['action'])) $action = 'index';
    else $action = $_POST['action'];
    $authorController->checkAction($action);
?>