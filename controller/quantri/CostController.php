<?php
include __DIR__.'/../BaseController.php';
include __DIR__.'/ReportFunctions.php';
include __DIR__."/../../model/GRN.php";

    class CostController extends BaseController{
        function __construct()
        {
            $this->folder = 'quantri';
        }
        function index(){
            $this->render('Cost', array(), false);
        }

        function show_report(){
            if (isset($_POST["time"]) && $_POST["time"] != "") {
                $time = $_POST["time"];
                $selectTime = $_POST["selectTime"];
                if ($time == "month") {
                    $dateStart = $selectTime . "-01";
                    $dateEnd = $selectTime . "-" . ReportFunctions::lastDayOfMonth($selectTime);
                    $weeks = ReportFunctions::getWeeks($selectTime);
            
                    $grnCount = [];
                    $grnProductCount = [];
                    $grnTotal = [];
            
                    $numOfWeek = array_keys($weeks);
                    $num = 0;
                    foreach ($weeks as $week) {
                        $grnCount[$numOfWeek[$num]] = GRN::getGRNCount($week[0], $week[count($week) - 1]);
                        $grnProductCount[$numOfWeek[$num]] = GRN::getGRNProductCount($week[0], $week[count($week) - 1]);
                        $grnTotal[$numOfWeek[$num]] = GRN::getGRNTotal($week[0], $week[count($week) - 1]);
                        $num++;
                    }
            
                    $sumGRNCount = array_sum($grnCount);
                    $sumGRNProductCount = array_sum($grnProductCount);
                    $sumGRNTotal = array_sum($grnTotal);
                    $numberToWords = ReportFunctions::numberToWords($sumGRNTotal);
            
                    echo json_encode(array(
                        "status" => "success", 
                        "time" => $weeks,
                        "count" => $grnCount,
                        "productCount" => $grnProductCount,
                        "total" => $grnTotal,
                        "sumCount" => $sumGRNCount,
                        "sumProductCount" => $sumGRNProductCount,
                        "sumTotal" => $sumGRNTotal,
                        "numberToWords" => $numberToWords . " đồng"
                    ));
                } else if ($time == "year") {
                    $dateStart = $selectTime . "-01-01";
                    $dateEnd = $selectTime . "-12-31";
                    $months = ReportFunctions::getDaysOfMonth($selectTime);
            
                    $grnCount = [];
                    $grnProductCount = [];
                    $grnTotal = [];
            
                    $numOfMonth = array_keys($months);
                    $num = 0;
                    foreach ($months as $month) {
                        $grnCount[$numOfMonth[$num]] = GRN::getGRNCount($month[0], $month[count($month) - 1]);
                        $grnProductCount[$numOfMonth[$num]] = GRN::getGRNProductCount($month[0], $month[count($month) - 1]);
                        $grnTotal[$numOfMonth[$num]] = GRN::getGRNTotal($month[0], $month[count($month) - 1]);
                        $num++;
                    }
            
                    $sumGRNCount = array_sum($grnCount);
                    $sumGRNProductCount = array_sum($grnProductCount);
                    $sumGRNTotal = array_sum($grnTotal);
                    $numberToWords = ReportFunctions::numberToWords($sumGRNTotal);
            
                    echo json_encode(array(
                        "status" => "success", 
                        "time" => $months,
                        "count" => $grnCount,
                        "productCount" => $grnProductCount,
                        "total" => $grnTotal,
                        "sumCount" => $sumGRNCount,
                        "sumProductCount" => $sumGRNProductCount,
                        "sumTotal" => $sumGRNTotal,
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
    $costController = new CostController();
    if(isset($_GET['page']) && $_GET['page'] == 'cost') $action = 'index';
    else if(isset($_POST['action'])) $action = $_POST['action'];
    $costController->checkAction($action);
?>