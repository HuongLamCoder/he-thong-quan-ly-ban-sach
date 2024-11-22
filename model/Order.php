<?php
    class Order{
        private int $idDH;
        private float $tongtien;
        private ?OrderStatus $status;
        private float $phiship;
        private string $ngaytao;
        private string $ngaycapnhat;
        private int $idTK;
        private int $idNV;

        function nhap(int $idDH, float $tongtien, float $phiship, string $ngaytao, string $ngaycapnhat, 
        int $idTK, int $idNV, ?OrderStatus $status=NULL){
            $this->idDH = $idDH;
            $this->tongtien = $tongtien;
            $this->status = $status;
            $this->phiship = $phiship;
            $this->ngaytao = $ngaytao;
            $this->ngaycapnhat = $ngaycapnhat;
            $this->idTK = $idTK;
            $this->idNV = $idNV;
        }

        static function getAll(){
            $list = [];
            $sql = 'SELECT * FROM donhang
            INNER JOIN trangthaidh ON donhang.idTT = trangthaidh.idTT';
            $con = new Database();
            $req = $con->getAll($sql);

            foreach($req as $item){
                $status = new OrderStatus($req['idTT'], $req['tenTT']);
                $order = new Order();
                $order->nhap($req['idDH'], $req['tongtien'], $req['phiship'], $req['ngaytao'], $req['ngaycapnhat'], 
            $req['idTK'], $req['idNV'], $status);
                $list[] = $order;
            }
            return $list;
        }

    }
?>