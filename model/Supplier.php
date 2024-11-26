<?php
if(isset($_POST['action'])) require '../../model/Address.php';
else require '../model/Address.php';

    class Supplier{
        private int $idNCC;
        private string $tenNCC;
        private Address $diachi;
        private string $email;
        private string $dienthoai;
        private int $trangthai;

        function __construct(){
            $this->idNCC = 0;
            $this->tenNCC = '';
            $this->diachi = new Address();
            $this->email = '';
            $this->dienthoai = '';
            $this->trangthai = 0;
        }

        function nhap(int $idNCC, string $tenNCC, string $email, string $dienthoai, int $trangthai){
            $this->idNCC = $idNCC;
            $this->tenNCC = $tenNCC;
            $this->email = $email;
            $this->dienthoai = $dienthoai;
            $this->trangthai = $trangthai;
        }

        function nhapFull(int $idNCC, string $tenNCC, string $email, string $dienthoai, int $trangthai, string $diachi){
            $this->nhap($idNCC, $tenNCC, $email, $dienthoai, $trangthai);
            $this->diachi->nhapFromString($diachi);
        }

        static function getAll(){
            $list = [];
            $sql = $sql = "SELECT * FROM nhacungcap";
            $con = new Database();
            $req = $con->getAll($sql);

            foreach($req as $item){
                $supplier = new self();
                $supplier->nhap($item['idNCC'], $item['tenNCC'], $item['email'], $item['dienthoai'], $item['trangthai']);
                $list[] = $supplier;
            }
            return $list;
        }

        static function getAllActive(){
            $list = [];
            $sql = $sql = "SELECT * FROM nhacungcap WHERE trangthai = 1";
            $con = new Database();
            $req = $con->getAll($sql);

            foreach($req as $item){
                $supplier = new self();
                $supplier->nhap($item['idNCC'], $item['tenNCC'], $item['email'], $item['dienthoai'], $item['trangthai']);
                $list[] = $supplier;
            }
            return $list;
        }

        static function isExist($idNCC, $ten, $email, $dienthoai){
            $sql = '';
            if($idNCC!=null)
                $sql = 'SELECT idNCC FROM nhacungcap 
            WHERE (tenNCC = "'.$ten.'" or email= "'.$email.'" or dienthoai= "'.$dienthoai.'") AND idNCC != "'.$idNCC.'"';
            else $sql = 'SELECT idNCC FROM nhacungcap 
            WHERE tenNCC = "'.$ten.'" or email= "'.$email.'" or dienthoai= "'.$dienthoai.'"';
            $con = new Database();
            return ($con->getOne($sql))!=null;
        }

        static function findByID($idNCC){
            $sql = 'SELECT * FROM nhacungcap WHERE idNCC='.$idNCC;
            $con = new Database();
            $req = $con->getOne($sql);
            if($req!=null){
                $supplier = new self();
                $supplier->nhapFull($req['idNCC'], $req['tenNCC'], $req['email'], $req['dienthoai'], $req['trangthai'], $req['diachi']);
                return $supplier;
            }
            return null;
        }

        function add(){
            if(!(self::isExist($this->idNCC, $this->tenNCC, $this->email, $this->dienthoai))){
                $sql='INSERT INTO nhacungcap(tenNCC, email, dienthoai, diachi, trangthai) VALUES ("'.$this->tenNCC.'","'.$this->email.'","'.$this->dienthoai.'","'.$this->diachi->convertToStore().'",'.$this->trangthai.')';
                $con = new Database();
                $con->execute($sql);
                return true;
            }
            return false;
        }

        function update(){
            if(!(self::isExist($this->idNCC, $this->tenNCC, $this->email, $this->dienthoai))){
                $sql = 'UPDATE nhacungcap 
                SET tenNCC = "'.$this->tenNCC.'", email = "'.$this->email.'", dienthoai = "'.$this->dienthoai.'", diachi = "'.$this->diachi->convertToStore().'",trangthai='.$this->trangthai.'
                WHERE idNCC = '.$this->idNCC;
                $con = new Database();
                $con->execute($sql);
                return true;
            }
            return false;
        }
        
        function toArray() {
            return [
                'idNCC' => $this->idNCC,
                'tenNCC' => $this->tenNCC,
                'email' => $this->email,
                'dienthoai' => $this->dienthoai,
                'diachi' => $this->diachi->toArray(),
                'trangthai' => $this->trangthai
            ];
        }

        function getIdNCC(){
            return $this->idNCC;
        }

        function getTenNCC(){
            return $this->tenNCC;
        }

        function getEmail(){
            return $this->email;
        }

        function getDienthoai(){
            return $this->dienthoai;
        }

        function getTrangthai(){
            return $this->trangthai;
        }

        function getIdTinh(){
            return $this->diachi->getIdTinh();
        }

        function getIdQuan(){
            return $this->diachi->getIdQuan();
        }

        function setTenNCC(string $tenNCC){
            $this->tenNCC= $tenNCC;
        }

        function setEmail(string $email){
            $this->email = $email;
        }

        function setDienthoai(string $dienthoai){
            $this->dienthoai = $dienthoai;
        }

        function setAddress(string $sonha, int $idTinh, int $idQuan, int $idXa){
            $this->diachi->nhap($sonha,$idTinh, $idQuan, $idXa);
        }

        function setTrangthai(int $trangthai){
            $this->trangthai = $trangthai;
        }
    }
?>