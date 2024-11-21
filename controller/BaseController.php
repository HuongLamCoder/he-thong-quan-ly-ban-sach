<?php
if(isset($_POST['action'])){
    require '../../config/config.php';
    require '../../lib/Database.php';
}
else{
    require '../config/config.php';
    require '../lib/Database.php';
}
    require 'Pagination.php';
    class BaseController{
        protected $folder;

        function render($file, $permission, $result=NULL, $paging=false){
            $option = in_array($permission, ['login']);
            if(!$option){
                $tenCNValues = array_column($_SESSION['permission'], 'tenCN');
                $found = array_filter($tenCNValues, fn($value) => strpos($value, $permission) !== false);
                if(!$found){
                    header('Location: http://localhost/he-thong-quan-ly-ban-sach/quantri/index.php');
                    exit;
                }
            }
            
            $view_file = '../view/'.$this->folder.'/'.$file.'.php';
            if(is_file($view_file)){
                if($paging){
                    $paging = new Pagination($this->folder, strtolower($file), $result);
                    $pagingButton = $paging->paging();
                }
                require($view_file);
            }
            else require '../view/error';
        }
    }
?>