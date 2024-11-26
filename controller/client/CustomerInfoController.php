<?php
if(isset($_POST['action'])){
    require '../BaseController.php';
    require '../../model/Account.php';
}
else{
    require __DIR__. '/../BaseController.php';
    require __DIR__.'/../../model/Account.php';
}
    class CustomerInfoController extends BaseController{
        private $account;

        function __construct()
        {
            $this->folder = 'client';
            $this->account = new Account();
        } 

        function show_infoForm(){
            $this->render('customerInfo','KH');
        }

        function changeInfo(){
            session_start();

            $tenTK = $_POST['fullname'];
            $email = $_POST['email'];
            $dienthoai = $_POST['phoneNumber'];

            //Lưu các trường thông tin được chỉnh sửa
            $this->account = Account::findByEmail($_SESSION['user']['email']);
            $this->account->setTenTK($tenTK);
            $this->account->setEmail($email);
            $this->account->setDienthoai($dienthoai);
            
            $this->account->updateAccountInfo();

            if (isset($_POST['changePassword']) && $_POST['changePassword'] === "true") {
                if(password_verify($_POST['currentPassword'], $this->account->getMatkhau()) === true) {
                    $matkhau = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                    $this->account->setMatkhau($matkhau);
                    $this->account->updateAccountPassword();

                    echo json_encode(array('success'=>true, 'msg' => "Cập nhật thông tin cá nhân và mật khẩu thành công"));
                } else {
                    echo json_encode(array('success'=>false, 'msg' => "Mật khẩu hiện tại không trùng khớp"));
                }
            } else {
                echo json_encode(array('success'=>true, 'msg' => "Cập nhật thông tin cá nhân thành công"));
            }

            //Cập nhật lại session sau khi đã thay đổi thông tin
            if (!empty($this->account->getTenTK())) {
                $_SESSION['user']['tenTK'] = $this->account->getTenTK();
            }
            
            if (!empty($this->account->getEmail())) {
                $_SESSION['user']['email'] = $this->account->getEmail();
            }

            if (!empty($this->account->getDienthoai())) {
                $_SESSION['user']['dienthoai'] = $this->account->getDienthoai();
            }

            exit;
        }

        function checkAction($action){
            switch ($action){
                case 'customerInfo':
                    $this->show_infoForm();
                    break;

                case 'submit_changeInfo':
                    $this->changeInfo();
                    break;

            }
        }
    }

    $customerInfoController = new CustomerInfoController();
    if(isset($_GET['page'])) $action = $_GET['page'];
    // else $action = $_GET['page'];
    if(isset($_POST['action'])) $action = $_POST['action'];
    $customerInfoController->checkAction($action);
?>