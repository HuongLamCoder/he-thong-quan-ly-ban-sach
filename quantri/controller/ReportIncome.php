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

        $orderCount = [];
        $orderProductCount = [];
        $orderTotal = [];

        $numOfWeek = array_keys($weeks);
        $num = 0;
        foreach ($weeks as $week) {
            $orderCount[$numOfWeek[$num]] = getOrderCount($week[0], $week[count($week) - 1]);
            $orderProductCount[$numOfWeek[$num]] = getOrderProductCount($week[0], $week[count($week) - 1]);
            $orderTotal[$numOfWeek[$num]] = getOrderTotal($week[0], $week[count($week) - 1]);
            $num++;
        }

        $sumOrderCount = array_sum($orderCount);
        $sumOrderProductCount = array_sum($orderProductCount);
        $sumOrderTotal = array_sum($orderTotal);
        $numberToWords = numberToWords($sumOrderTotal);

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
        $months = getDaysOfMonth($selectTime);

        $orderCount = [];
        $orderProductCount = [];
        $orderTotal = [];

        $numOfMonth = array_keys($months);
        $num = 0;
        foreach ($months as $month) {
            $orderCount[$numOfMonth[$num]] = getOrderCount($month[0], $month[count($month) - 1]);
            $orderProductCount[$numOfMonth[$num]] = getOrderProductCount($month[0], $month[count($month) - 1]);
            $orderTotal[$numOfMonth[$num]] = getOrderTotal($month[0], $month[count($month) - 1]);
            $num++;
        }

        $sumOrderCount = array_sum($orderCount);
        $sumOrderProductCount = array_sum($orderProductCount);
        $sumOrderTotal = array_sum($orderTotal);
        $numberToWords = numberToWords($sumOrderTotal);

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
?>