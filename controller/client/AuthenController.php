<?php
if(isset($_POST['action'])){
    require '../BaseController.php';
    require '../../model/Account.php';
}
else{
    require __DIR__. '/../BaseController.php';
    require __DIR__.'/../../model/Account.php';
}
    class AuthenController extends BaseController{
        private $account;

        function __construct()
        {
            $this->folder = 'client';
            $this->account = new Account();
        } 

        function show_loginForm(){
            $this->render('login','KH');
        }

        function login(){
            // kiem tra thong tin dang nhap
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->account = Account::findByEmail($email);
            $msg = $this->checkLogin($email, $password);
            if($msg==''){
                //$role = Role::findByID($this->account->getIdNQ());
                session_start();
                $_SESSION['user'] = $this->account->toArray();
                echo json_encode(array('success'=>true));
            }
            else echo json_encode(array('success'=>false, 'msg'=>$msg));
            exit;
        }

        function checkLogin($email, $password){
            $msg = '';
            // Kiểm tra xem có tồn tại không?
            if(!empty($this->account)) {
                if($this->account->getIdNQ() == 1){
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

        function show_signUpForm(){
            $this->render('signUp','KH');
        }

        function signUp(){
            // kiem tra thong tin dang nhap

            $tenTK = $_POST['fullname'];
            $email = $_POST['email'];
            $dienthoai = $_POST['phoneNumber'];
            $matkhau = $_POST['password'];
            $checkEmail = Account::findByEmail($email);
            if($checkEmail == null) {
                $newAccount = new Account();
                $newAccount->setTenTK($tenTK);
                $newAccount->setEmail($email);
                $newAccount->setDienthoai($dienthoai);
                $newAccount->setMatkhau(password_hash($matkhau  , PASSWORD_DEFAULT));
                $newAccount->setTrangthai("1");
                $newAccount->setIdNQ("1");
                $newAccount->add();

                echo json_encode(array('success'=>true, 'msg' => "Đăng ký tài khoản thành công"));
            } else  {
                echo json_encode(array('success'=>false, 'msg' => "Email đã tồn tại"));
            }
            
            exit;
        }

        function checkAction($action){
            switch ($action){
                case 'login':
                    $this->show_loginForm();
                    break;

                case 'signUp':
                    $this->show_signUpForm();
                    break;
                
                case 'submit_login':
                    $this->login();
                    break;

                case 'submit_signUp':
                    $this->signUp();
                    break;
            }
        }
    }

    $authenController = new AuthenController();
    if(isset($_GET['page'])) $action = $_GET['page'];
    // else $action = $_GET['page'];
    if(isset($_POST['action'])) $action = $_POST['action'];
    $authenController->checkAction($action);
?>