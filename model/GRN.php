<?php
    class GRN{
        private int $idPN;
        private float $tongtien;
        private int $tongsoluong;
        private string $ngaytao;
        private string $ngaycapnhat;
        private string $trangthai;
        private float $chietkhau;
        private int $idNV;

        function nhap(int $idPN, string $ngaytao, string $ngaycapnhat, float $tongtien, string $trangthai, int $idNV, float $chietkhau, int $tongsoluong){
            $this->idPN = $idPN;
            $this->ngaytao = $ngaytao;
            $this->ngaycapnhat = $ngaycapnhat;
            $this->trangthai = $trangthai;
            $this->idNV = $idNV;
            $this->tongtien = $tongtien;
            $this->chietkhau = $chietkhau;
            $this->tongsoluong = $tongsoluong;
        }

        static function getAll(){
            $list = [];
            $sql = 'SELECT DISTINCT * FROM phieunhap';
            $con = new Database();
            $req = $con->getAll($sql);

            foreach($req as $item){
                $grn = new self();
                $grn->nhap($item['idPN'], $item['ngaytao'], $item['ngaycapnhat'], $item['tongtien'], $item['trangthai'], $item['idNV'], $item['chietkhau'], $item['tongsoluong']);
                $list[] = $grn;
            }
            return $list;
        }

        function addNewPhieuNhapKho(){
            $sql='INSERT INTO phieunhap(idNV) VALUE('.$this->idNV.')';
            $con = new Database();
            $con->execute($sql);
        }

        static function getLastPhieuNhapKhoID(){
            $sql = 'SELECT idPN 
            FROM phieunhap
            ORDER BY idPN DESC
            LIMIT 1';
            $con = new Database();
            $req = $con->getOne($sql);
            return $req['idPN'];
        }

        function nhapUpdate($ngaycapnhat, $tongsoluong, $tongtien, $trangthai, $ngaytao='', $chietkhau=0){
            $this->ngaytao = $ngaytao;
            $this->ngaycapnhat = $ngaycapnhat;
            $this->trangthai = $trangthai;
            $this->tongtien = $tongtien;
            $this->chietkhau = $chietkhau;
            $this->tongsoluong = $tongsoluong;
        }

        function createPhieuNhapKho(){
            $sql = 'UPDATE phieunhap
            SET ngaytao = "'.$this->ngaytao.'",
            ngaycapnhat = "'.$this->ngaycapnhat.'",
            chietkhau = '.$this->chietkhau.',
            tongsoluong= '.$this->tongsoluong.',
            tongtien = '.$this->tongtien.',
            trangthai = "'.$this->trangthai.'"
            WHERE idPN = '.$this->idPN;
            $con = new Database();
            $con->execute($sql);
        }

        static function findByID($idPN){
            $sql = 'SELECT * FROM phieunhap WHERE idPN='.$idPN;
            $con = new Database();
            $req = $con->getOne($sql);
            if($req!=null){
                $grn = new GRN();
                $grn->nhap($req['idPN'], $req['ngaytao'], $req['ngaycapnhat'], $req['tongtien'], $req['trangthai'], $req['idNV'], $req['chietkhau'], $req['tongsoluong']);
                return $grn;
            }
            return null;
        }

        function update(){
            $sql = 'UPDATE phieunhap
            SET ngaycapnhat = "'.$this->ngaycapnhat.'",
            tongsoluong = '.$this->tongsoluong.',
            tongtien = '.$this->tongtien.',
            trangthai = "'.$this->trangthai.'"
            WHERE idPN = '.$this->idPN;
            $con = new Database();
            $con->execute($sql);
        }

        function toArray(){
            return [
                'idPN' => $this->idPN,
                'ngaytao' => $this->ngaytao,
                'ngaycapnhat' => $this->ngaycapnhat,
                'tongtien' => $this->tongtien,
                'trangthai' => $this->trangthai, 
                'idNV' => $this->idNV,
                'chietkhau' => $this->chietkhau,
                'tongsoluong' => $this->tongsoluong
            ];
        }

        function setIdPN($idPN){
            $this->idPN = $idPN;
        }

        function setIdNV($idNV){
            $this->idNV = $idNV;
        }

        function getIdPN(){
            return $this->idPN;
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

        function getTrangthai(){
            return $this->trangthai;
        }

        function getIdNV(){
            return $this->idNV;
        }
    }
?>