<?php
require __DIR__. '/../BaseController.php';
require __DIR__.'/../../model/Account.php';
require __DIR__.'/../../model/Order.php';
require __DIR__.'/../../model/OrderDetail.php';
require __DIR__.'/../../model/Product.php';

    class CustomerInfoController extends BaseController{
        private $account;

        function __construct()
        {
            $this->folder = 'client';
            $this->account = new Account();
        } 

        function show_infoForm(){
            $this->render('customerInfo');
        }

        function changeInfo(){
            if (session_status() == PHP_SESSION_NONE) { 
                session_start(); 
            }

            $tenTK = $_POST['fullname'];
            $email = $_POST['email'];
            $dienthoai = $_POST['phoneNumber'];

            //Lưu các trường thông tin được chỉnh sửa
            $this->account = Account::findByEmail($_SESSION['user']['email']);
            $this->account->setTenTK($tenTK);
            $this->account->setEmail($email);
            $this->account->setDienthoai($dienthoai);
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

            if($this->account->updateAccountInfo())
                echo json_encode(array('success'=>true, 'msg' => "Cập nhật thông tin cá nhân thành công"));
            else echo json_encode(array('success' => false, 'msg' => 'Email đã tồn tại'));
            exit;
        }

        function changePassword(){
            if(password_verify($_POST['currentPassword'], $this->account->getMatkhau()) === true) {
                $matkhau = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                $this->account->setMatkhau($matkhau);
                $this->account->updateAccountPassword();
                echo json_encode(array('success'=>true, 'msg' => "Mật khẩu thành công"));
            } else echo json_encode(array('success'=>false, 'msg' => "Mật khẩu hiện tại không trùng khớp"));
        }

        function show_orderHistory(){
            $orders = Order::getAllOrdersByIdTK($_SESSION['user']['idTK']);
            $this->render('orderHistory', $orders);
        }

        function show_orderDetail(){
            $order = Order::findByID($_GET['idDH']);
            $orderDetails = OrderDetail::findByOrder($_GET['idDH']);
            $result = [
                'order' => $order,
                'orderDetails' => $orderDetails
            ];
            $this->render('orderDetail', $result);
        }

        function show_changePassword(){
            $this->render('customerChangePassword');
        }

        function checkAction($action){
            switch ($action){
                case 'customerInfo':
                    $this->show_infoForm();
                    break;

                case 'changePassword':
                    $this->show_changePassword();
                    break;

                case 'submit_changeInfo':
                    $this->changeInfo();
                    break;

                case 'submit_changePassword':
                    $this->changePassword();
                    break;

                case 'orderHistory':
                    $this->show_orderHistory();
                    break;

                case 'orderDetail':
                    $this->show_orderDetail();
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