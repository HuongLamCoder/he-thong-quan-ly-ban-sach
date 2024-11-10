<?php 
include_once "../../lib/connect.php";
   
/* INCOME */
function getOrderCount($dateStart, $dateEnd) {
    $sql = "SELECT COUNT(dh.idDH) as total
            FROM donhang dh
            WHERE dh.idTT = 3
            AND dh.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
    $result = getOne($sql)['total'];
    if ($result == null) {
        return 0;
    }
    return (int)$result;
}

function getOrderProductCount($dateStart, $dateEnd) {
    $sql = "SELECT SUM(ct.soluong) as total
            FROM donhang dh, ctdonhang ct
            WHERE ct.idDH = dh.idDH
            AND dh.idTT = 3
            AND dh.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
    $result = getOne($sql)['total'];
    if ($result == null) {
        return 0;
    }
    return (int)$result;
}

function getOrderTotal($dateStart, $dateEnd) {
    $sql = "SELECT SUM(dh.tongtien) as total
            FROM donhang dh
            WHERE dh.idTT = 3
            AND dh.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
    $result = getOne($sql)['total'];
    if ($result == null) {
        return 0;
    }
    return (int)$result;
}
/* ... */

/* COST */
function getGRNCount($dateStart, $dateEnd) {
    $sql = "SELECT COUNT(pn.idPN) as total
            FROM phieunhap pn
            WHERE pn.trangthai = 'htat'
            AND pn.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
    $result = getOne($sql)['total'];
    if ($result == null) {
        return 0;
    }
    return (int)$result;
}

function getGRNProductCount($dateStart, $dateEnd) {
    $sql = "SELECT SUM(pn.tongsoluong) as total
            FROM phieunhap pn
            WHERE pn.trangthai = 'htat'
            AND pn.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
    $result = getOne($sql)['total'];
    if ($result == null) {
        return 0;
    }
    return (int)$result;
}

function getGRNTotal($dateStart, $dateEnd) {
    $sql = "SELECT SUM(pn.tongtien) as total
            FROM phieunhap pn
            WHERE pn.trangthai = 'htat'
            AND pn.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
    $result = getOne($sql)['total'];
    if ($result == null) {
        return 0;
    }
    return (int)$result;
}
/* ... */

/* PROFIT */
function getProfit($dateStart, $dateEnd) {
    $income = (int)getOrderTotal($dateStart, $dateEnd);
    $cost = (int)getGRNTotal($dateStart, $dateEnd);
    return $income - $cost;
}
/* ... */

?>