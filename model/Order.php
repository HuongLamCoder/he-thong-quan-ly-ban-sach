<?php
include __DIR__.'/OrderStatus.php';
    class Order{
        private int $idDH;
        private float $tongtien;
        private ?OrderStatus $trangthai;
        private float $phiship;
        private string $diachi;
        private string $ngaytao;
        private string $ngaycapnhat;
        private int $idTK;
        private int $idNV;

        function nhap(int $idDH, float $tongtien, float $phiship, string $diachi, string $ngaytao, string $ngaycapnhat, 
        int $idTK, int $idNV, ?OrderStatus $trangthai=NULL){
            $this->idDH = $idDH;
            $this->tongtien = $tongtien;
            $this->trangthai = $trangthai;
            $this->phiship = $phiship;
            $this->diachi = $diachi;
            $this->ngaytao = $ngaytao;
            $this->ngaycapnhat = $ngaycapnhat;
            $this->idTK = $idTK;
            $this->idNV = $idNV;
        }

        static function getAll(){
            $list = [];
            $sql = 'SELECT DISTINCT * FROM donhang
            INNER JOIN trangthaidh ON donhang.idTT = trangthaidh.idTT';
            $con = new Database();
            $req = $con->getAll($sql);

            foreach($req as $item){
                $trangthai = new OrderStatus($item['idTT'], $item['tenTT']);
                $order = new Order();
                $order->nhap($item['idDH'], $item['tongtien'], $item['phiship'], $item['diachi'], $item['ngaytao'], $item['ngaycapnhat'], 
            $item['idTK'], $item['idNV'], $trangthai);
                $list[] = $order;
            }
            return $list;
        }

        static function findByID($idDH){
            $list = [];
            $sql = 'SELECT * FROM donhang
            INNER JOIN trangthaidh ON donhang.idTT = trangthaidh.idTT
            WHERE idDH = '.$idDH;
            $con = new Database();
            $req = $con->getOne($sql);
            if($req!=null){
                $trangthai = new OrderStatus($req['idTT'], $req['tenTT']);
                $order = new Order();
                $order->nhap($req['idDH'], $req['tongtien'], $req['phiship'], $req['diachi'], $req['ngaytao'], $req['ngaycapnhat'], 
            $req['idTK'], $req['idNV'], $trangthai);
                return $order;
            }
            return null;
        }

        function toArray(){
            return [
              'idDH' => $this->idDH,
              'tongtien' => $this->tongtien,
              'trangthai' => $this->trangthai->toArray(),
              'phiship' => $this->phiship,  
              'diachi' => $this->diachi,
              'ngaytao' => $this->ngaytao,
              'ngaycapnhat' => $this->ngaycapnhat,
              'idTK' => $this->idTK,
              'idNV' => $this->idNV
            ];
        }

        function getIdNV(){
            return $this->idNV;
        }

        function getIdTK(){
            return $this->idTK;
        }

        function getIdDH(){
            return $this->idDH;
        }

        function getNgaytao(){
            return $this->ngaytao;
        }

        function getNgaycapnhat(){
            return $this->ngaycapnhat;
        }

        function getTongtien(){
            return $this->tongtien;
        }

        function getTenTT(){
            return $this->trangthai->getTenTT();
        }

    }
?>