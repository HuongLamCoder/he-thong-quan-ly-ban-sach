<?php
    include dirname(__FILE__).'/../BaseController.php';
    include dirname(__FILE__).'/../../model/Account.php';
    class AccountController extends BaseController{
        private $account;
        private $role;

        function __construct()
        {
            $this->folder = 'quantri';
            $this->account= new Account();
            $this->role = new Role();
        }

        function index(){
            $account = Account::getAll();
            $role = Role::getAll();
            $result = [
                'role' => $role,
                'paging' => $account
            ];
            $this->render('Account', $result, true);
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

        /* HUONG LE 23/11/2024 */
        function searchAccount() {
            $sql = 'SELECT idTK, tenTK, email, matkhau, dienthoai, taikhoan.idNQ AS idNQ, tenNQ, nhomquyen.trangthai AS trangthaiNQ, taikhoan.trangthai AS trangthai 
                FROM taikhoan 
                    LEFT JOIN nhomquyen ON taikhoan.idNQ = nhomquyen.idNQ
                WHERE 1';

                $pageTitle = 'searchAccount';
                if(isset($_GET['kyw']) && ($_GET['kyw']) != "") {
                    $kyw = $_GET['kyw'];
                    $pageTitle .= '&kyw='.$kyw;
                    $sql .= ' AND (idTK LIKE "%'.$kyw.'%" OR tenTK LIKE "%'.$kyw.'%")';
                }

                if(isset($_GET['role_select']) && $_GET['role_select'] != -1) {
                    $idNQ = $_GET['role_select'];
                    $pageTitle .= '&role_select='.$idNQ;
                    $sql .= ' AND taikhoan.idNQ = '.$idNQ;
                }

                if(isset($_GET['status_select']) && $_GET['status_select'] != -1 ) {
                    $trangthai = $_GET['status_select'];
                    $pageTitle .= '&status_select='.$trangthai;
                    $sql .= ' AND taikhoan.trangthai = '.$trangthai;
                }

                $list = [];
                $con = new Database();
                $req = $con->getAll($sql);
                foreach($req as $item){
                    $role = new Role();
                    $role->nhap($item['idNQ'], $item['tenNQ']);
                    $acc = new Account();
                    $acc->nhap($item['idTK'], $item['tenTK'], $item['dienthoai'], $item['email'], $item['matkhau'], $item['trangthai'], $role);
                    $list[] = $acc;
                }

                $account = $list;
                $role = Role::getAll();

                $result = [
                    'paging' => $account,
                    'role' => $role
                ];
                $this->renderSearch('Account', $result, $pageTitle);
            
        }
        /* HUONG LE 23/11/2024 */

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
                    $this->searchAccount();
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