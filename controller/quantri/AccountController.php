<?php
if(isset($_POST['action'])){
    require '../BaseController.php';
    require '../../model/Account.php';
}
else{
    require '../controller/BaseController.php';
    require '../model/Account.php';
}
    class AccountController extends BaseController{
        private $account;

        function __construct()
        {
            $this->folder = 'quantri';
            $this->account= new Account();
        }

        function index(){
            $account = Account::getAll();
            $this->render('Account','TK', array('paging' => $account), true);
        }

        function add(){
            $this->account->setTenTK($_POST['username']);
            $this->account->setEmail($_POST['usermail']);
            $this->account->setMatkhau(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $this->account->setDienthoai($_POST['userphone']);
            $this->account->setIdNQ($_POST['role-select']);
            $this->account->setTrangthai(1);
            $req = $this->account->add();
            if($req) echo json_encode(array('btn'=>'add', 'success'=>true));
            else echo json_encode(array('btn'=>'add', 'success'=>false));
            exit;
        }

        function openAddForm(){
            $role = Role::getAllActive();
            echo json_encode($role);
            exit;
        }

        function edit(){
            $account = Account::findByID($_POST['account_id']);
            $role = Role::getAll();
            $list = [];
            foreach($role as $item)
                $list[] = $item->toArrayNQ();
            if($account==null || empty($list)) $result = null;
            else
            $result = [
                'account' => $account->toArray(),
                'role' => $list
            ];
            echo json_encode($result);
            exit;
        }

        function update(){
            $this->account->setIdTK($_POST['account_id']);
            $this->account->setTenTK($_POST['username']);
            $this->account->setEmail($_POST['usermail']);
            $this->account->setDienthoai($_POST['userphone']);
            $this->account->setIdNQ($_POST['role-select']);
            $trangthai = isset($_POST['status']) ? 1 : 0;
            $this->account->setTrangthai($trangthai);
            $req = $this->account->update();
            if($req) echo json_encode(array('btn'=>'update','success'=>true));
            else echo json_encode(array('btn'=>'update','success'=>false));
            exit;
        }

        function checkAction($action){
            switch ($action){
                case 'index':
                    $this->index();
                    break;

                case 'open_add_form':
                    $this->openAddForm();
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

    $accountController = new AccountController();
    if(!isset($_POST['action'])) $action = 'index';
    else $action = $_POST['action'];
    $accountController->checkAction($action);
?>