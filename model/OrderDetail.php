<?php
class OrderDetail
{
    private int $idDH;
    private int $idSach;
    private int $soluong;
    private float $gialucdat;

    function __construct($idDH = 0, $idSach = 0, $soluong = 0, $gialucdat = 0)
    {
        $this->idDH = $idDH;
        $this->idSach = $idSach;
        $this->soluong = $soluong;
        $this->gialucdat = $gialucdat;
    }

    function nhap($idDH, $idSach, $soluong, $gialucdat)
    {
        $this->idDH = $idDH;
        $this->idSach = $idSach;
        $this->soluong = $soluong;
        $this->gialucdat = $gialucdat;
    }

    static function findByOrder($idDH)
    {
        $list = [];
        $sql = 'SELECT * FROM ctdonhang
            WHERE idDH = ' . $idDH;
        $con = new Database();
        $req = $con->getAll($sql);
        foreach ($req as $item) {
            $detail = new OrderDetail();
            $detail->nhap($item['idDH'], $item['idSach'], $item['soluong'], $item['gialucdat']);
            $list[] = $detail->toArray();
        }
        return $list;
    }

    function toArray()
    {
        return [
            'idDH' => $this->idDH,
            'idSach' => $this->idSach,
            'soluong' => $this->soluong,
            'gialucdat' => $this->gialucdat
        ];
    }

    function saveOrderDetail() {
        $sql = 'INSERT INTO ctdonhang (idDH, idSach, soluong, gialucdat)
            VALUES (' . $this->idDH . ', ' . $this->idSach . ', ' . $this->soluong . ', ' . $this->gialucdat . ')';
        $con = new Database();
        return $con->execute($sql);
    }


    // Getters and Setters
    public function getIdDH()
    {
        return $this->idDH;
    }

    public function setIdDH($idDH)
    {
        $this->idDH = $idDH;
        return $this;
    }

    public function getIdSach()
    {
        return $this->idSach;
    }

    public function setIdSach($idSach)
    {
        $this->idSach = $idSach;
        return $this;
    }

    public function getSoluong()
    {
        return $this->soluong;
    }

    public function setSoluong($soluong)
    {
        $this->soluong = $soluong;
        return $this;
    }

    public function getGialucdat()
    {
        return $this->gialucdat;
    }

    public function setGialucdat($gialucdat)
    {
        $this->gialucdat = $gialucdat;
        return $this;
    }
}
