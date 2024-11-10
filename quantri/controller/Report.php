<?php
if (isset($_GET["page"]) && $_GET["page"] != "") {
    $page = $_GET["page"];
    switch ($page) {
        case "income":
            include "view/Income.php";
            break;
        case "cost":
            include "view/Cost.php";
            break;
        case "profit":
            include "view/Profit.php";
            break;
    }
}




