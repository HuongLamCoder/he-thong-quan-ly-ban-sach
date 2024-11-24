<?php
if(isset($_POST['action'])) require '../../model/Permission.php';
else require __DIR__.'/Permission.php';
    class Role{
        private $idNQ;
        private $tenNQ;
        private $trangthai;
        private array $permissions = [];

        function nhap($idNQ, $tenNQ, $trangthai){
            $this->idNQ = $idNQ;
            $this->tenNQ = $tenNQ;
            $this->trangthai = $trangthai;
        }

        static function getAll(){
            $list = [];
            $sql = 'SELECT * FROM nhomquyen WHERE idNQ!=1';
            $con = new Database();
            $req = $con->getAll($sql);

            foreach($req as $item){
                $role = new Role();
                $role->nhap($item['idNQ'], $item['tenNQ'], $item['trangthai']);
                $list[] = $role;
            }
            return $list;
        }

        static function getAllForAccount(){
            $list = [];
            $sql = 'SELECT * FROM nhomquyen';
            $con = new Database();
            $req = $con->getAll($sql);

            foreach($req as $item){
                $role = new Role();
                $role->nhap($item['idNQ'], $item['tenNQ'], $item['trangthai']);
                $list[] = $role;
            }
            return $list;
        }

        static function getAllActive(){
            $list = [];
            $sql = 'SELECT * FROM nhomquyen WHERE trangthai=1';
            $con = new Database();
            $req = $con->getAll($sql);
            foreach($req as $item){
                $role = new Role();
                $role->nhap($item['idNQ'], $item['tenNQ'], $item['trangthai']);
                $list[] = $role->toArrayNQ();
            }
            return $list==null ? null: $list;
        }

        static function isExist($idNQ, $tenNQ){
            $sql = 'SELECT * FROM nhomquyen WHERE tenNQ = "'.$tenNQ.'"';
            if($idNQ!=null) $sql.=' AND idNQ!='.$idNQ;
            $con = new Database();
            return ($con->getOne($sql))!=null;
        }

        static function findByID($idNQ){
            $sql = 'SELECT * FROM nhomquyen WHERE idNQ='.$idNQ;
            $con = new Database();
            $req = $con->getOne($sql);
            if($req!=null){
                $role = new Role();
                $role->nhap($req['idNQ'], $req['tenNQ'], $req['trangthai']);
                $role->getDetail();
                return $role;
            }
            return null;
        }

        function getDetail(){
            $sql = 'SELECT * FROM ctnhomquyen
                    INNER JOIN chucnang ON ctnhomquyen.idCN = chucnang.idCN
                    WHERE idNQ='.$this->idNQ;
            $con = new Database();
            $req = $con->getAll($sql);
            foreach($req as $item){
                $permission = new Permission($item['idCN'], $item['tenCN']);
                $this->permissions[] = $permission;
            }
        }

        function add($permission_name){
            if(!(self::isExist($this->idNQ, $this->tenNQ))){
                // tao moi nhom quyen
                $sql = 'INSERT INTO nhomquyen(tenNQ, trangthai) VALUE("'.$this->tenNQ.'", '.$this->trangthai.')';
                $con = new Database();
                $con->execute($sql);
                //getLastID
                $this->idNQ = $this->getLastID();
                //addDetail
                $n = count($permission_name)-1; // except 'btn_submit_add'
                $idCN = [];
                for($i = 0; $i < $n; $i++){
                    $permission = Permission::findByName($permission_name[$i]);
                    $idCN[] = $permission->getIdCN();
                }
                $this->addDetail($idCN);
                return true;
            }
            return false;
        }

        function getLastID(){
            $sql = 'SELECT idNQ
            FROM nhomquyen
            ORDER BY idNQ DESC
            LIMIT 1';
            $con = new Database();
            return $con->getOne($sql)['idNQ'];
        }

        function addDetail(array $idCN){
            $sql = 'INSERT INTO ctnhomquyen(idNQ, idCN) VALUE';
            foreach($idCN as $item)
                $sql .= '('.$this->idNQ.','.$item.'),';
            $sql = rtrim($sql, ',');
            $con = new Database();
            $con->execute($sql);
        }

        function update($permission_name){
            if(!(self::isExist($this->idNQ, $this->tenNQ))){
                $sql = 'UPDATE nhomquyen SET tenNQ = "'.$this->tenNQ.'" WHERE idNQ ='.$this->idNQ;
                $con = new Database();
                $con->execute($sql);
                //revoke permission
                $this->revokePermission();
                //addDetail
                $n = count($permission_name)-1; // except 'btn_submit_add'
                for($i = 0; $i < $n; $i++){
                    $permission = Permission::findByName($permission_name[$i]);
                    $idCN[] = $permission->getIdCN();
                    
                }
                $this->addDetail($idCN);
                return true;
            }
            return false;
        }

        function revokePermission(){
            $sql = 'DELETE FROM ctnhomquyen WHERE idNQ ='.$this->idNQ;
            $con = new Database();
            $con->execute($sql);
        }

        function lock(){
            $sql = 'UPDATE nhomquyen SET trangthai = 0 WHERE idNQ='.$this->idNQ;
            $con = new Database();
            $con->execute($sql);
        }

        function unlock(){
            $sql = 'UPDATE nhomquyen SET trangthai = 1 WHERE idNQ='.$this->idNQ;
            $con = new Database();
            $con->execute($sql);
        }
        
        function toArray() {
            return [
                'role' => $this->toArrayNQ(),
                'role_detail' => $this->toArrayDetail()
            ];
        }

        function toArrayDetail(){
            $list = [];
            foreach($this->permissions as $item)
                $list[] = $item->toArray();
            return $list;
        }

        function toArrayNQ(){
            return [
                'idNQ' => $this->idNQ,
                'tenNQ' => $this->tenNQ,
                'trangthai' => $this->trangthai
            ];
        }
        
        function setIdNQ($idNQ){
            $this->idNQ = $idNQ;
        }

        function setTenNQ($tenNQ){
            $this->tenNQ = $tenNQ;
        }

        function setTrangthai($trangthai){
            $this->trangthai = $trangthai;
        }

        function getIdNQ(){
            return $this->idNQ;
        }

        function getTenNQ(){
            return $this->tenNQ;
        }

        function getTrangthai(){
            return $this->trangthai;
        }

    }
?>