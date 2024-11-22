<?php
    class GRNDetail{
        private int $idSach;
        private int $idPN;
        private int $soluong;

        function nhap($idPN, $idSach, $soluong){
            $this->idSach = $idSach;
            $this->idPN = $idPN;
            $this->soluong = $soluong;
        }

        function addCTPhieunhap(){
            $sql='INSERT INTO ctphieunhap(idPN, idSach, soluong) 
        VALUES ('.$this->idPN.','.$this->idSach.','.$this->soluong.')';
        $con = new Database();
        $con->execute($sql);
        }
    }
?>