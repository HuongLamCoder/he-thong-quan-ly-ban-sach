<?php
include __DIR__.'/../BaseController.php';
include __DIR__.'/ReportFunctions.php';
include __DIR__."/../../model/Order.php";

    class IncomeController extends BaseController{
        function __construct()
        {
            $this->folder = 'quantri';
        }
        function index(){
            $this->render('Income', array(), false);
        }

        function show_report(){
            if (isset($_POST["time"]) && $_POST["time"] != "") {
                $time = $_POST["time"];
                $selectTime = $_POST["selectTime"];
                if ($time == "month") {
                    $dateStart = $selectTime . "-01";
                    $dateEnd = $selectTime . "-" . ReportFunctions::lastDayOfMonth($selectTime);
                    $weeks = ReportFunctions::getWeeks($selectTime);
            
                    $orderCount = [];
                    $orderProductCount = [];
                    $orderTotal = [];
            
                    $numOfWeek = array_keys($weeks);
                    $num = 0;
                    foreach ($weeks as $week) {
                        $orderCount[$numOfWeek[$num]] = Order::getOrderCount($week[0], $week[count($week) - 1]);
                        $orderProductCount[$numOfWeek[$num]] = Order::getOrderProductCount($week[0], $week[count($week) - 1]);
                        $orderTotal[$numOfWeek[$num]] = Order::getOrderTotal($week[0], $week[count($week) - 1]);
                        $num++;
                    }
            
                    $sumOrderCount = array_sum($orderCount);
                    $sumOrderProductCount = array_sum($orderProductCount);
                    $sumOrderTotal = array_sum($orderTotal);
                    $numberToWords = ReportFunctions::numberToWords($sumOrderTotal);
            
                    echo json_encode(array(
                        "status" => "success", 
                        "time" => $weeks,
                        "count" => $orderCount,
                        "productCount" => $orderProductCount,
                        "total" => $orderTotal,
                        "sumCount" => $sumOrderCount,
                        "sumProductCount" => $sumOrderProductCount,
                        "sumTotal" => $sumOrderTotal,
                        "numberToWords" => $numberToWords . " đồng"
                    ));
                } else if ($time == "year") {
                    $dateStart = $selectTime . "-01-01";
                    $dateEnd = $selectTime . "-12-31";
                    $months = ReportFunctions::getDaysOfMonth($selectTime);
            
                    $orderCount = [];
                    $orderProductCount = [];
                    $orderTotal = [];
            
                    $numOfMonth = array_keys($months);
                    $num = 0;
                    foreach ($months as $month) {
                        $orderCount[$numOfMonth[$num]] = Order::getOrderCount($month[0], $month[count($month) - 1]);
                        $orderProductCount[$numOfMonth[$num]] = Order::getOrderProductCount($month[0], $month[count($month) - 1]);
                        $orderTotal[$numOfMonth[$num]] = Order::getOrderTotal($month[0], $month[count($month) - 1]);
                        $num++;
                    }
            
                    $sumOrderCount = array_sum($orderCount);
                    $sumOrderProductCount = array_sum($orderProductCount);
                    $sumOrderTotal = array_sum($orderTotal);
                    $numberToWords = ReportFunctions::numberToWords($sumOrderTotal);
            
                    echo json_encode(array(
                        "status" => "success", 
                        "time" => $months,
                        "count" => $orderCount,
                        "productCount" => $orderProductCount,
                        "total" => $orderTotal,
                        "sumCount" => $sumOrderCount,
                        "sumProductCount" => $sumOrderProductCount,
                        "sumTotal" => $sumOrderTotal,
                        "numberToWords" => $numberToWords . " đồng"
                    ));
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "Thời gian không đúng định dạng"));
            }
        }

        function checkAction($action){
            switch($action){
                case 'index':
                    $this->index();
                    break;
                
                case 'show':
                    $this->show_report();
                    break;
            }
        }
    }
    $incomeController = new IncomeController();
    if(isset($_GET['page']) && $_GET['page'] == 'income') $action = 'index';
    else if(isset($_POST['action'])) $action = $_POST['action'];
    $incomeController->checkAction($action);
?>