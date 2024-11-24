<?php
    class Permission{
        private $idCN;
        private $tenCN;

        function __construct($idCN, $tenCN)
        {
            $this->idCN = $idCN;
            $this->tenCN = $tenCN;
        }

        static function findByName($tenCN){
            $sql = 'SELECT * FROM chucnang WHERE tenCN ="'.$tenCN.'"';
            $con = new Database();
            $req = $con->getOne($sql);
            if($req!=null) return new self($req['idCN'], $req['tenCN']);
            return null;
        }
        // static function getAll(){
        //     $list = [];
        //     $sql = 'SELECT * FROM tacgia';
        //     $con = new Database();
        //     $req = $con->getAll($sql);

        //     foreach($req as $item){
        //         $author = new Author();
        //         $author->nhap($item['idTG'], $item['tenTG'], $item['trangthai']);
        //         $list[] = $author;
        //     }
        //     return $list;
        // }

        // static function isExist($idTG, $tenTG){
        //     $sql = 'SELECT idTG FROM tacgia WHERE tenTG= "'.$tenTG.'"';
        //     if($idTG!=null) $sql.=' AND idTG!='.$idTG;
        //     $con = new Database();
        //     return ($con->getOne($sql))!=null;
        // }

        // static function findByID($idTG){
        //     $sql = 'SELECT * FROM tacgia WHERE idTG='.$idTG;
        //     $con = new Database();
        //     $req = $con->getOne($sql);
        //     if($req!=null){
        //         $author = new Author();
        //         $author->nhap($req['idTG'], $req['tenTG'], $req['trangthai']);
        //         return $author;
        //     }
        //     return null;
        // }

        // function add(){
        //     if(!(Author::isExist($this->idTG, $this->tenTG))){
        //         $sql = 'INSERT INTO tacgia(tenTG, trangthai) VALUES ("'.$this->tenTG.'", '.$this->trangthai.')';
        //         $con = new Database();
        //         $con->execute($sql);
        //         return true;
        //     }
        //     return false;
        // }

        // function update(){
        //     if(!(Author::isExist($this->idTG, $this->tenTG))){
        //         $sql = 'UPDATE tacgia
        //             SET tenTG = "'.$this->tenTG.'", trangthai = '.$this->trangthai.'
        //             WHERE idTG = '.$this->idTG;
        //         $con = new Database();
        //         $con->execute($sql);
        //         return true;
        //     }
        //     return false;
        // }
        
        function toArray() {
            return [
                'idCN' => $this->idCN,
                'tenCN' => $this->tenCN,
            ];
        }

        // function setIdTG($idTG){
        //     $this->idTG = $idTG;
        // }

        // function setTenTG($tenTG){
        //     $this->tenTG = $tenTG;
        // }

        // function setTrangthai($trangthai){
        //     $this->trangthai = $trangthai;
        // }

        // function getIdTG(){
        //     return $this->idTG;
        // }

        // function getTenTG(){
        //     return $this->tenTG;
        // }

        // function getTrangthai(){
        //     return $this->trangthai;
        // }

        function getIdCN(){
            return $this->idCN;
        }

    }
?>