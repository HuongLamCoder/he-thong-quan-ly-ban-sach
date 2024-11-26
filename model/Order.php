<?php
include __DIR__.'/OrderStatus.php';
    class Order{
        private int $idDH;
        private float $tamtinh;
        private int $idTT;
        private string $phuong_thuc_tt;
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

        static function getAllOrdersByIdTK($idTK){
            $sql=
                'SELECT 
                donhang.idDH AS idDonHang,
                tenTT AS trangthaiDH,
                trangthai AS trangthaiSach, 
                hinhanh AS hinhanh, 
                tuasach AS tuasach, 
                soluong AS soluong, 
                gialucdat AS gialucdat, 
                SUM(tamtinh+phiship) AS tongtien,
                COUNT(ctdonhang.idSach) AS tongsoluong
                FROM donhang INNER JOIN CTdonhang ON donhang.idDH = CTdonhang.idDH
                INNER JOIN sach ON CTdonhang.idSach = sach.idSach 
                INNER JOIN trangthaidh ON trangthaidh.idTT = donhang.idTT
                WHERE 
                    idTK = '.$idTK.'
                GROUP BY 
                    donhang.idDH;
                ';
            $con = new Database();
            return $con->getAll($sql);
        }

        function update($ngaycapnhat, $idNV, $trangthai){
            $sql = 'UPDATE donhang 
            SET ngaycapnhat = "'.$ngaycapnhat.'",
            idNV = "'.$idNV.'",
            idTT = "'.$trangthai.'"
            WHERE idDH ='.$this->idDH;
            $con = new Database();
            $con->execute($sql);
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

        /* INCOME */
        static function getOrderCount($dateStart, $dateEnd) {
            $sql = "SELECT COUNT(dh.idDH) as total
                    FROM donhang dh
                    WHERE dh.idTT = 5
                    AND dh.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
            $con = new Database();
            $result = $con->getOne($sql)['total'];
            if ($result == null) {
                return 0;
            }
            return (int)$result;
        }

        static function getOrderProductCount($dateStart, $dateEnd) {
            $sql = "SELECT SUM(ct.soluong) as total
                    FROM donhang dh, ctdonhang ct
                    WHERE ct.idDH = dh.idDH
                    AND dh.idTT = 5
                    AND dh.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
            $con = new Database();
            $result = $con->getOne($sql)['total'];
            if ($result == null) {
                return 0;
            }
            return (int)$result;
        }

        static function getOrderTotal($dateStart, $dateEnd) {
            $sql = "SELECT SUM(dh.tongtien) as total
                    FROM donhang dh
                    WHERE dh.idTT = 5
                    AND dh.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
            $con = new Database();
            $result = $con->getOne($sql)['total'];
            if ($result == null) {
                return 0;
            }
            return (int)$result;
        }
        /* ... */

        function setIdDH($idDH){
            $this->idDH = $idDH;
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