<?php
    class ReportController extends BaseController{
        function __construct()
        {
            $this->folder = 'quantri';
        }

        function checkAction($action){
            switch ($action){
                
            }
        }
    }

    $reportController = new ReportController();
    if(isset($_GET['page'])) $reportController->checkAction($_GET['page']);
?>