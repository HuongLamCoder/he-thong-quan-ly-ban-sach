<?php
include __DiR__.'/../BaseController.php';
include __DiR__.'/../../model/Order.php';
include __DiR__.'/../../model/OrderDetail.php';
include __DiR__.'/../../model/Account.php';
include __DiR__.'/../../model/Product.php';


    class OrderController extends BaseController{

        function __construct()
        {
            $this->folder = 'quantri';
        }

        function index(){
            $order = Order::getAll();
            $this->render('Order', array('paging' => $order), true);
        }

        function edit(){
            $order = Order::findByID($_POST['order_id']);
            $details = OrderDetail::findByOrder($_POST['order_id']);
            $products = [];
            foreach($details as $item){
                $product = Product::findByID($item['idSach']);
                $products[] = $product->toArray();
            }
            $nhanvien = Account::findByID($order->getIdNV());
            $khachhang = Account::findByID($order->getIdTK());
            $result = [
                'order' => $order->toArray(),
                'details' => $details,
                'nhanvien' => $nhanvien->toArray(),
                'khachhang' => $khachhang->toArray(),
                'products' => $products
            ];
            echo json_encode($result);
            exit;
        }

        function update(){
            $ngaycapnhat = date("Y-m-d");
            session_start();
            $idNV = $_SESSION['user']['idTK'];
            $idDH = $_POST['idDH'];
            $trangthai = $_POST['status-option'];
            $this->order->setIdDH($idDH);
            $this->order->update($ngaycapnhat, $idNV, $trangthai);
            echo json_encode(array('success'=>true));
        }

        function checkAction($action){
            switch ($action){
                case 'index':
                    $this->index();
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

    $orderController = new OrderController();
    if(!isset($_POST['action'])) $action = 'index';
    else $action = $_POST['action'];
    $orderController->checkAction($action);
?>
