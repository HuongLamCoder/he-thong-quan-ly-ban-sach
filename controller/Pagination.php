<?php
    class Pagination{
        public $folder;
        public $num_per_page;
        public $curr_page;
        public $start;
        public $total_records;
        public $total_pages;
        public $pageTitle;

        function __construct($folder, $pageTitle, $total_records){
            //folder
            $this->folder = $folder;
            //num_per_page
            if($this->folder == 'quantri') $this->num_per_page = NUM_PER_PAGE_QUANTRI;
            else $this->num_per_page = NUM_PER_PAGE_CLIENT;
            //curr_page
            $this->curr_page = $this->getCurrPage();
            //start
            $this->start = ($this->curr_page-1)*$this->num_per_page;
            //total_records
            $this->total_records = count($total_records);
            //total_pages
            $this->total_pages = ceil($this->total_records/$this->num_per_page);
            //pageTitle
            $this->pageTitle = $pageTitle;
        }

        function paging(){
            $view = '<li class="page-item disabled">';
            if($this->curr_page>1)
            $view.='<a class="page-link" href="index.php?page='.$this->pageTitle.'&index='.($this->curr_page-1).'">Trước</a></li>';
            else $view.='<a class="page-link" href="index.php?page='.$this->pageTitle.'&index=1">Trước</a></li>';
            for($i=1; $i<=$this->total_pages; $i++){
                $view.='<li class="page-item">';
                if($this->curr_page==$i)
                    $view.='<a class="page-link active" href="index.php?page='.$this->pageTitle.'&index='.$i.'">'.$i.'</li>';
                else $view.='<a class="page-link" href="index.php?page='.$this->pageTitle.'&index='.$i.'">'.$i.'</li>';
            }
            $view.='<li class="page-item">';
            if(($this->curr_page) < ($this->total_pages))
                $view.='<a class="page-link text-dark" href="index.php?page='.$this->pageTitle.'&index='.($this->curr_page+1).'">Sau</a></li>';
            else $view.='<a class="page-link text-dark" href="index.php?page='.$this->pageTitle.'&index='.$this->total_pages.'">Sau</a></li>';
            return $view;
        }

        function getCurrPage(){
            return isset($_GET['index']) ? $_GET['index'] : 1;
        }
    }
?>