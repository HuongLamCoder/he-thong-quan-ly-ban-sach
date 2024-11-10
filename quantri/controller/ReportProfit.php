<?php 
include_once "../model/Report.php";
include_once "./ReportFunctions.php";

if (isset($_POST["time"]) && $_POST["time"] != "") {
    $time = $_POST["time"];
    $selectTime = $_POST["selectTime"];
    if ($time == "month") {
        $dateStart = $selectTime . "-01";
        $dateEnd = $selectTime . "-" . lastDayOfMonth($selectTime);
        $weeks = getWeeks($selectTime);

        $orderTotal = [];
        $grnTotal = [];
        $profit = [];

        $numOfWeek = array_keys($weeks);
        $num = 0;
        foreach ($weeks as $week) {
            $orderTotal[$numOfWeek[$num]] = getOrderTotal($week[0], $week[count($week) - 1]);
            $grnTotal[$numOfWeek[$num]] = getGRNTotal($week[0], $week[count($week) - 1]);
            $profit[$numOfWeek[$num]] = $orderTotal[$numOfWeek[$num]] - $grnTotal[$numOfWeek[$num]];
            $num++;
        }

        $sumOrderTotal = array_sum($orderTotal);
        $sumGRNTotal = array_sum($grnTotal);
        $sumProfit = array_sum($profit);
        $numberToWords = numberToWords($sumProfit);

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
        $months = getDaysOfMonth($selectTime);

        $orderTotal = [];
        $grnTotal = [];
        $profit = [];

        $numOfMonth = array_keys($months);
        $num = 0;
        foreach ($months as $month) {
            $orderTotal[$numOfMonth[$num]] = getOrderTotal($month[0], $month[count($month) - 1]);
            $grnTotal[$numOfMonth[$num]] = getGRNTotal($month[0], $month[count($month) - 1]);
            $profit[$numOfMonth[$num]] = $orderTotal[$numOfMonth[$num]] - $grnTotal[$numOfMonth[$num]];
            $num++;
        }

        $sumOrderTotal = array_sum($orderTotal);
        $sumGRNTotal = array_sum($grnTotal);
        $sumProfit = array_sum($profit);
        $numberToWords = numberToWords($sumProfit);

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
?>