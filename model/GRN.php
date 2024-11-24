<?php
    class GRN{
        private int $idPN;
        private float $tongtien;
        private int $tongsoluong;
        private string $ngaytao;
        private string $ngaycapnhat;
        private int $trangthai;
        private int $idNV;

        function nhap(int $idPN, string $ngaytao, string $ngaycapnhat, float $tongtien, int $trangthai, int $idNV){
            $this->idPN = $idPN;
            $this->ngaytao = $ngaytao;
            $this->ngaycapnhat = $ngaycapnhat;
            $this->trangthai = $trangthai;
            $this->idNV = $idNV;
        }
        
        static function getAll(){
            $list = [];
            $sql = 'SELECT DISTINCT * FROM phieunhap';
            $con = new Database();
            $req = $con->getAll($sql);

            foreach($req as $item){
                $grn = new self();
                $grn->nhap($item['idPN'], $item['ngaytao'], $item['ngaycapnhat'], $item['tongtien'], $item['trangthai'], $item['idNV']);
                $list[] = $grn;
            }
            return $list;
        }
    }
?>