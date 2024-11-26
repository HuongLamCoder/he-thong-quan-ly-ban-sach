<?php
class OrderStatus
{
    private int $idTT;
    private string $tenTT;

    function __construct($idTT, $tenTT)
    {
        $this->idTT = $idTT;
        $this->tenTT = $tenTT;
    }

    static function getAll()
    {
        $list = [];
        $sql = 'SELECT * FROM trangthaidh';
        $con = new Database();
        $req = $con->getAll($sql);

        foreach ($req as $item) {
            $orderstatus = new OrderStatus($item['idTT'], $item['tenTT']);
            $list[] = $orderstatus->toArray();
        }
        return $list;
    }

    function toArray()
    {
        return [
            'idTT' => $this->idTT,
            'tenTT' => $this->tenTT
        ];
    }


    // Getters and Setters
    public function getIdTT()
    {
        return $this->idTT;
    }

    public function setIdTT($idTT)
    {
        $this->idTT = $idTT;
        return $this;
    }

    public function getTenTT()
    {
        return $this->tenTT;
    }

    public function setTenTT($tenTT)
    {
        $this->tenTT = $tenTT;
        return $this;
    }
}
