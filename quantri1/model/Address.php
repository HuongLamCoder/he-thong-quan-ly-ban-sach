<?php 
function getAllProvince(){
    $sql = "SELECT * FROM tinh";
    return getAll($sql);
}

function getAllDistrict($idTinh){
    $sql = 'SELECT * FROM quan WHERE idTinh = '.$idTinh;
    return getAll($sql);
}

function getAllWard($idQuan){
    $sql = 'SELECT * FROM xa WHERE idQuan = '.$idQuan;
    return getAll($sql);
}
function getProvinceNameById($provinceId) {
    $sql = "SELECT * FROM `tinh` WHERE `idTinh` = " . $provinceId;
    return getOne($sql)['tenTinh'];
}

function getDistrictNameById($districtId) {
    $sql = "SELECT * FROM `quan` WHERE `idQuan` = " . $districtId;
    return getOne($sql)['tenQuan'];
}

function getWardNameById($wardId) {
    $sql = "SELECT * FROM `xa` WHERE `idXa` = " . $wardId;
    return getOne($sql)['tenXa'];
}

function getIdTinh($tentinh){
    $sql = 'SELECT idTinh FROM tinh WHERE tenTinh LIKE "%'.$tentinh.'%"';
    return getOne($sql);
}

function getIdQuan($tenquan, $idTinh){
    $sql = 'SELECT idQuan FROM quan WHERE tenQuan LIKE "%'.$tenquan.'%" AND idTinh = '.$idTinh;
    return getOne($sql);
}

function getIdXa($tenxa, $idQuan){
    $sql = 'SELECT idXa FROM xa WHERE tenXa LIKE "%'.$tenxa.'%" AND idQuan = '.$idQuan;
    return getOne($sql);
}

function getAllDistrictByProvince($idTinh){
    $sql = 'SELECT * FROM quan WHERE idTinh = '.$idTinh;
    return getAll($sql);
}

function getAllWardByDistrict($idQuan){
    $sql = 'SELECT * FROM xa WHERE idQuan = '.$idQuan;
    return getAll($sql);
}
?>