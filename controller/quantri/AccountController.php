<?php
    include dirname(__FILE__).'/../BaseController.php';
    include dirname(__FILE__).'/../../model/Account.php';
    include dirname(__FILE__).'/../../model/Role.php';

    class AccountController extends BaseController{
        private $account;

        function __construct()
        {
            $this->folder = 'quantri';
            $this->account= new Account();
        }

        function index(){
            $account = Account::getAll();
            $role = Role::getAll();
            $result = [
                'paging' => $account,
                'role' => $role
            ];
            $this->render('Account', $result, true);
        }

        function add(){
            $matkhau = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $this->account->nhap(NULL, $_POST['username'], $_POST['userphone'], $_POST['usermail'], $matkhau, 1, $_POST['role-select']);
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
            $role = Role::getAllForAccount();
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
            $trangthai = isset($_POST['status']) ? 1 : 0;$trangthai = isset($_POST['status']) ? 1 : 0;
            $this->account->nhap($_POST['account_id'], $_POST['username'], $_POST['userphone'], $_POST['usermail'], NULL, $trangthai, $_POST['role-select']);
            $req = $this->account->update();
            if($req) echo json_encode(array('btn'=>'update','success'=>true));
            else echo json_encode(array('btn'=>'update','success'=>false));
            exit;
        }

        function search(){
            session_start();
            var_dump($_SESSION['user']);
            $pageTitle = 'searchAccount';
            $kyw = NULL;
            $idNQ = NULL;
            $trangthai = NULL;

            if(isset($_GET['kyw']) && ($_GET['kyw']) != "") {
                $kyw = $_GET['kyw'];
                $pageTitle .= '&kyw='.$kyw;
            }

            if(isset($_GET['role_select']) && $_GET['role_select'] != -1) {
                $idNQ = $_GET['role_select'];
                $pageTitle .= '&role_select='.$idNQ;
            }

            if(isset($_GET['status_select']) && $_GET['status_select'] != -1 ) {
                $trangthai = $_GET['status_select'];
                $pageTitle .= '&status_select='.$trangthai;
            }

            $role = Role::getAll();

            $result = [
                'paging' => Account::search($kyw, $idNQ, $trangthai),
                'role' => $role
            ];
            $this->renderSearch('Account', $result, $pageTitle);
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

                case 'search':
                    $this->search();
                    break;
            }
        }
    }

    $accountController = new AccountController();
    if(isset($_GET['page']) && $_GET['page'] == 'searchAccount') $action = 'search';
    else if(!isset($_POST['action'])) $action = 'index';
    else $action = $_POST['action'];
    $accountController->checkAction($action);
?>