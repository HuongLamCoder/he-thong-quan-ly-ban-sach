<?php
include __DIR__.'/../BaseController.php';
include __DIR__.'/ReportFunctions.php';
include __DIR__."/../../model/Order.php";
include __DIR__."/../../model/GRN.php";

class ProfitController extends BaseController{
    function __construct()
    {
        $this->folder = 'quantri';
    }
    function index(){
        $this->render('Profit', array(), false);
    }

    function show_report(){
        if (isset($_POST["time"]) && $_POST["time"] != "") {
            $time = $_POST["time"];
            $selectTime = $_POST["selectTime"];
            if ($time == "month") {
                $dateStart = $selectTime . "-01";
                $dateEnd = $selectTime . "-" . ReportFunctions::lastDayOfMonth($selectTime);
                $weeks = ReportFunctions::getWeeks($selectTime);
        
                $orderTotal = [];
                $grnTotal = [];
                $profit = [];
        
                $numOfWeek = array_keys($weeks);
                $num = 0;
                foreach ($weeks as $week) {
                    $orderTotal[$numOfWeek[$num]] = Order::getOrderTotal($week[0], $week[count($week) - 1]);
                    $grnTotal[$numOfWeek[$num]] = GRN::getGRNTotal($week[0], $week[count($week) - 1]);
                    $profit[$numOfWeek[$num]] = $orderTotal[$numOfWeek[$num]] - $grnTotal[$numOfWeek[$num]];
                    $num++;
                }
        
                $sumOrderTotal = array_sum($orderTotal);
                $sumGRNTotal = array_sum($grnTotal);
                $sumProfit = array_sum($profit);
                $numberToWords = ReportFunctions::numberToWords($sumProfit);
        
                echo json_encode(array(
                    "status" => "success", 
                    "time" => $weeks,
                    "orderTotal" => $orderTotal,
                    "grnTotal" => $grnTotal,
                    "profit" => $profit,
                    "sumOrderTotal" => $sumOrderTotal,
                    "sumGRNTotal" => $sumGRNTotal,
                    "sumProfit" => $sumProfit,
                    "numberToWords" => $numberToWords . " đồng"
                ));
            } else if ($time == "year") {
                $dateStart = $selectTime . "-01-01";
                $dateEnd = $selectTime . "-12-31";
                $months = ReportFunctions::getDaysOfMonth($selectTime);
        
                $orderTotal = [];
                $grnTotal = [];
                $profit = [];
        
                $numOfMonth = array_keys($months);
                $num = 0;
                foreach ($months as $month) {
                    $orderTotal[$numOfMonth[$num]] = Order::getOrderTotal($month[0], $month[count($month) - 1]);
                    $grnTotal[$numOfMonth[$num]] = GRN::getGRNTotal($month[0], $month[count($month) - 1]);
                    $profit[$numOfMonth[$num]] = $orderTotal[$numOfMonth[$num]] - $grnTotal[$numOfMonth[$num]];
                    $num++;
                }
        
                $sumOrderTotal = array_sum($orderTotal);
                $sumGRNTotal = array_sum($grnTotal);
                $sumProfit = array_sum($profit);
                $numberToWords = ReportFunctions::numberToWords($sumProfit);
        
                echo json_encode(array(
                    "status" => "success", 
                    "time" => $months,
                    "orderTotal" => $orderTotal,
                    "grnTotal" => $grnTotal,
                    "profit" => $profit,
                    "sumOrderTotal" => $sumOrderTotal,
                    "sumGRNTotal" => $sumGRNTotal,
                    "sumProfit" => $sumProfit,
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
$profitController = new ProfitController();
if(isset($_GET['page']) && $_GET['page'] == 'profit') $action = 'index';
else if(isset($_POST['action'])) $action = $_POST['action'];
$profitController->checkAction($action);
?>