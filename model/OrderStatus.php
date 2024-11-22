<?php
    class OrderStatus{
        private int $idTT;
        private string $tenTT;

        function nhap($idTT, $tenTT){
            $this->idTT = $idTT;
            $this->tenTT = $tenTT;
        }
    }
?>