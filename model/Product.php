<?php
    class Product{
        private int $idSach;
        private string $tuasach;
        private string $mota;
        private int $tonkho;
        private int $luotban;
        private string $nxb;
        private int $namxb;
        private float $giaban;
        private float $giabia;
        private int $trangthai;
        private int $idNCC;
        private string $hinhanh;
        private float $trongluong;
        private array $idTG;
        private ?int $idMGG;
        private int $idTL;

        function __construct(){
            $this->idSach = 0;
            $this->tuasach = '';
            $this->mota = '';
            $this->tonkho = 0;
            $this->luotban = 0;
            $this->nxb = '';
            $this->namxb = 0;
            $this->giaban = 0;
            $this->giabia = 0;
            $this->trangthai = 0;
            $this->idNCC = 0;
            $this->hinhanh = '';
            $this->trongluong = 0;
            $this->idMGG = NULL;
            $this->idTG = [];
            $this->idTL = 0;
        }

        function nhap(string $hinhanh, string $tuasach, string $nxb, int $idNCC, int $idTL, float $giabia, int $namxb,
         string $mota, float $trongluong, int $trangthai, float $giaban, int $idSach = 0, int $tonkho=0, array $idTG = []){
            $this->idSach = $idSach;
            $this->tuasach = $tuasach;
            $this->tonkho = $tonkho;
            $this->giaban = $giaban;
            $this->trangthai = $trangthai;
            $this->hinhanh = $hinhanh;
        }

        static function getAll(){
            $list = [];
            $sql = 'SELECT * FROM sach';
            $con = new Database();
            $req = $con->getAll($sql);

            foreach($req as $item){
                $product = new self();
                $product->nhap($item['hinhanh'], $item['tuasach'], $item['NXB'], $item['idNCC'], $item['idTL'], $item['giabia'], 
                $item['namXB'], $item['mota'], $item['giaban'], $item['trongluong'], $item['trangthai'], $item['idSach'], $item['tonkho']);
                $list[] = $product;
            }
            return $list;
        }

        function isExist(){
            $listTG = implode(',', $this->idTG);
            $sql = 'SELECT s.idSach
            FROM sach s
            JOIN sach_tacgia st ON s.idSach = st.idSach
            WHERE s.tuasach = "'.$this->tuasach.'"
            AND s.namxb = '.$this->namxb.'
            AND s.giabia = '.$this->giabia.'
            AND s.idNCC = '.$this->idNCC.'
            AND s.nxb = "'.$this->nxb.'"';
            if($this->idSach!=0) $sql.=' AND idSach!='.$this->idSach;
            $sql.='GROUP BY s.idSach
            HAVING GROUP_CONCAT(st.idTG ORDER BY st.idTG ASC) = "'.$listTG.'"';
            $con = new Database();
            return ($con->getOne($sql))!=null;
        }

        function add(){
            if(!($this->isExist())){
                $sql='insert into Sach(hinhanh, tuasach, nxb, namxb, idNCC, giabia, giaban, idTL, mota, trangthai, idMGG, trongluong, tonkho) 
                values ("'.$this->hinhanh.'","'.$this->tuasach.'","'.$this->nxb.'",'.$this->namxb.','.$this->idNCC.','.$this->giabia.','.$this->giaban.
                ','.$this->idTL.',"'.$this->mota.'",'.$this->trangthai.', '.$this->idMGG.', '.$this->trongluong.', '.$this->tonkho.')';
                $con = new Database();
                $con->execute($sql);
                $this->idSach = $this->getLastID();
                $this->addDetail();
                return true;
            }
            return false;
        }

        function getLastID(){
            $sql = 'SELECT idSach
            FROM sach
            ORDER BY idSach DESC
            LIMIT 1';
            $con = new Database();
            return $con->getOne($sql)['idSach'];
        }

        function addDetail(){
            $sql = 'INSERT INTO sach_tacgia(idSach, idTG) VALUE';
            foreach($this->idTG as $item)
                $sql .= '('.$this->idSach.','.$item.'),';
            $sql = rtrim($sql, ',');
            $con = new Database();
            $con->execute($sql);
        }

        function getTuasach(){
            return $this->tuasach;
        }

        function getIdSach(){
            return $this->idSach;
        }

        function getHinhanh(){
            return $this->hinhanh;
        }

        function getTonkho(){
            return $this->tonkho;
        }

        function getGiaban(){
            return $this->giaban;
        }

        function getTrangthai(){
            return $this->trangthai;
        }
    }
?>