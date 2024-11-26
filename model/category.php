<?php
    class Category{
        private $idTL;
        private $tenTL;
        private $trangthai;

        function nhap($idTL, $tenTL, $trangthai){
            $this->idTL = $idTL;
            $this->tenTL = $tenTL;
            $this->trangthai = $trangthai;
        }

        static function getAll(){
            $sql = 'SELECT * FROM theloai';
            $list = []; 
            $con = new Database();
            $req = $con->getAll($sql);
            foreach($req as $item){
                $product = new self();
                $product->nhap($item['idTL'], $item['tenTL'], $item['trangthai']);
                $list[] = $product;
            }
            return $list;
        }

        static function getAllActive(){
            $sql = 'SELECT * FROM theloai WHERE trangthai = 1';

            $list = []; 
            $con = new Database();
            $req = $con->getAll($sql);
            foreach($req as $item){
                $product = new self();
                $product->nhap($item['idTL'], $item['tenTL'], $item['trangthai']);
                $list[] = $product;
            }
            return $list;
        }

        static function isExist($idTL, $tenTL){
            $sql = 'SELECT idTL FROM theloai WHERE tenTL= "'.$tenTL.'"';
            if($idTL!=null) $sql.=' AND idTL!='.$idTL;
            $con = new Database();
            return ($con->getOne($sql))!=null;
        }

        static function findByID($idTL){
            $sql = 'SELECT * FROM theloai WHERE idTL='.$idTL;
            $con = new Database();
            $req = $con->getOne($sql);
            if($req!=null){
                $category = new Category();
                $category->nhap($req['idTL'], $req['tenTL'], $req['trangthai']);
                return $category;
            }
            return null;
        }

        function add(){
            if(!(Category::isExist($this->idTL, $this->tenTL))){
                $sql = 'INSERT INTO theloai(tenTL, trangthai) VALUES ("'.$this->tenTL.'", '.$this->trangthai.')';
                $con = new Database();
                $con->execute($sql);
                return true;
            }
            return false;
        }

        function update(){
            if(!(Category::isExist($this->idTL, $this->tenTL))){
                $sql = 'UPDATE theloai
                    SET tenTL = "'.$this->tenTL.'", trangthai = '.$this->trangthai.'
                    WHERE idTL = '.$this->idTL;
                $con = new Database();
                $con->execute($sql);
                return true;
            }
            return false;
        }
        
        function toArray() {
            return [
                'idTL' => $this->idTL,
                'tenTL' => $this->tenTL,
                'trangthai' => $this->trangthai
            ];
        }

        /* HUONG LE 22/11/2024 */
        static function getCategoryByIdBook($idSach) {
            $sql = 'SELECT theloai.idTL, tenTL, theloai.trangthai
                    FROM theloai
                        INNER JOIN sach on theloai.idTL = sach.idTL
                    WHERE sach.idSach='.$idSach.' AND theloai.trangthai = 1';
            $con = new Database();
            $req = $con->getOne($sql);
            if($req!=null){
                $category = new Category();
                $category->nhap($req['idTL'], $req['tenTL'], $req['trangthai']);
                return $category;
            }
            return null;
        }
        /* HUONG LE 22/11/2024 */

        function setIdTL($idTL){
            $this->idTL = $idTL;
        }

        function setTenTL($tenTL){
            $this->tenTL = $tenTL;
        }

        function setTrangthai($trangthai){
            $this->trangthai = $trangthai;
        }

        function getIdTL(){
            return $this->idTL;
        }

        function getTenTL(){
            return $this->tenTL;
        }

        function getTrangthai(){
            return $this->trangthai;
        }

    }
?>