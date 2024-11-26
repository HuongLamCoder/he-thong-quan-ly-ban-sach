<?php
if(isset($_POST['action'])){
    require '../BaseController.php';
    require '../../model/Account.php';
}
else{
    require '../controller/BaseController.php';
    require '../model/Account.php';
}
    class AuthenController extends BaseController{
        private $account;

        function __construct()
        {
            $this->folder = 'quantri';
            $this->account = new Account();
        }

        function show_loginForm(){
            $this->render('Login','login');
        }

        function login(){
            // kiem tra thong tin dang nhap
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->account = Account::findByEmail($email);
            $msg = $this->checkLogin($email, $password);
            if($msg==''){
                $role = Role::findByID($this->account->getIdNQ());
                session_start();
                $_SESSION['user'] = $this->account->toArray();
                $_SESSION['permission'] = $role->toArrayDetail();
                $chucnang = $_SESSION['permission'][0];
                echo json_encode(array('success'=>true, 'chucnang'=>$chucnang['tenCN']));
            }
            else echo json_encode(array('success'=>false, 'msg'=>$msg));
            exit;
        }

        function checkLogin($email, $password){
            $msg = '';
            // Kiểm tra xem có tồn tại không?
            if(!empty($this->account)) {
                if($this->account->getIdNQ()!=1){
                    $db_password = $this->account->getMatkhau();
                    // So sánh mật khẩu nhập vào với mật khẩu trong cơ sở dữ liệu
                    if (password_verify($password, $db_password)) {
                        if ($this->account->getTrangthai() != 1) 
                            $msg = "Tài khoản của bạn đã bị khoá!";
                    }else $msg = "Mật khẩu không chính xác!";
                }else $msg = "Tài khoản không có quyền truy cập!";
            }else $msg = "Tài khoản không tồn tại!";
            return $msg;
        }    

        function checkAction($action){
            switch ($action){
                case 'show_loginForm':
                    $this->show_loginForm();
                    break;

                case 'login':
                    $this->login();
                    break;
                // case 'open_add_form':
                //     $this->openAddForm();
                //     break;

                // case 'submit_btn_add':
                //     $this->add();
                //     break;
                
                // case 'edit_data':
                //     $this->edit();
                //     break;

                // case 'submit_btn_update':
                //     $this->update();
                //     break;
            }
        }
    }

    $authenController = new AuthenController();
    if(!isset($_POST['action'])) $action = 'show_loginForm';
    else $action = $_POST['action'];
    $authenController->checkAction($action);
?>