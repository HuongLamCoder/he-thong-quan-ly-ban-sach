<?php
     function getAllSupplier(){
        $sql = $sql = "SELECT * FROM nhacungcap";
        return getALL( $sql);
    }
    function getSupplierByID($id){
        $sql = 'SELECT * FROM nhacungcap WHERE idNCC='.$id;
        return getOne($sql);
    }

    
    function isSupplierExist($ten, $email, $dienthoai, $diachi){
        $sql = 'SELECT idNCC FROM nhacungcap 
        WHERE tenNCC = "'.$ten.'" or email= "'.$email.'" or dienthoai= "'.$dienthoai.'" or diachi = "'.$diachi.'"';
       return getOne($sql)!=null;
    }

    function isSupplierExist_update($ten, $email, $dienthoai,$idNCC){
        $sql = 'SELECT idNCC FROM nhacungcap 
        WHERE (tenNCC = "'.$ten.'" or email= "'.$email.'" or dienthoai= "'.$dienthoai.'") AND idNCC != "'.$idNCC.'"';
       return getOne($sql)!=null;
    }
    function addSupplier($tenNCC, $email, $dienthoai, $diachi){
        $sql='INSERT INTO nhacungcap(tenNCC, email, dienthoai, diachi, trangthai) VALUES ("'.$tenNCC.'","'.$email.'","'.$dienthoai.'","'.$diachi.'",1)';
        insert($sql);
    }

    function updateSupplier($id, $tenNCC, $email, $dienthoai, $diachi,$status) {
        $sql = 'UPDATE nhacungcap 
                SET tenNCC = "'.$tenNCC.'", email = "'.$email.'", dienthoai = "'.$dienthoai.'", diachi = "'.$diachi.'",trangthai='.$status.'
                WHERE idNCC = '.$id;
         edit($sql);
    }
    
?>