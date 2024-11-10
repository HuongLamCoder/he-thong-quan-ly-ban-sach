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

        $grnCount = [];
        $grnProductCount = [];
        $grnTotal = [];

        $numOfWeek = array_keys($weeks);
        $num = 0;
        foreach ($weeks as $week) {
            $grnCount[$numOfWeek[$num]] = getGRNCount($week[0], $week[count($week) - 1]);
            $grnProductCount[$numOfWeek[$num]] = getGRNProductCount($week[0], $week[count($week) - 1]);
            $grnTotal[$numOfWeek[$num]] = getGRNTotal($week[0], $week[count($week) - 1]);
            $num++;
        }

        $sumGRNCount = array_sum($grnCount);
        $sumGRNProductCount = array_sum($grnProductCount);
        $sumGRNTotal = array_sum($grnTotal);
        $numberToWords = numberToWords($sumGRNTotal);

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
        $months = getDaysOfMonth($selectTime);

        $grnCount = [];
        $grnProductCount = [];
        $grnTotal = [];

        $numOfMonth = array_keys($months);
        $num = 0;
        foreach ($months as $month) {
            $grnCount[$numOfMonth[$num]] = getGRNCount($month[0], $month[count($month) - 1]);
            $grnProductCount[$numOfMonth[$num]] = getGRNProductCount($month[0], $month[count($month) - 1]);
            $grnTotal[$numOfMonth[$num]] = getGRNTotal($month[0], $month[count($month) - 1]);
            $num++;
        }

        $sumGRNCount = array_sum($grnCount);
        $sumGRNProductCount = array_sum($grnProductCount);
        $sumGRNTotal = array_sum($grnTotal);
        $numberToWords = numberToWords($sumGRNTotal);

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
?>