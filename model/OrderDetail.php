<?php
    class OrderDetail{
        private int $idDH;
        private int $idSach;
        private int $soluong;
        private int $gialucdat;

        function nhap($idDH, $idSach, $soluong, $gialucdat){
            $this->idDH = $idDH;
            $this->idSach = $idSach;
            $this->soluong = $soluong;
            $this->gialucdat = $gialucdat;
        }

        static function findByOrder($idDH){
            $list = [];
            $sql = 'SELECT * FROM ctdonhang
            WHERE idDH = '.$idDH;
            $con = new Database();
            $req = $con->getAll($sql);
            foreach($req as $item){
                $detail = new OrderDetail();
                $detail->nhap($item['idDH'], $item['idSach'], $item['soluong'], $item['gialucdat']);
                $list[] = $detail->toArray();
            }
            return $list;
        }

        function toArray(){
            return [
                'idDH' => $this->idDH,
                'idSach' => $this->idSach,
                'soluong' => $this->soluong,
                'gialucdat' => $this->gialucdat
            ];
        }

    }
?>