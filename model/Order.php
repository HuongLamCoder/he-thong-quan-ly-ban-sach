<?php
class Order
{
    private int $idDH;
    private float $tamtinh;
    private int $idTT;
    private float $phiship;
    private string $diachi;
    private string $ngaytao;
    private string $ngaycapnhat;
    private int $idTK;
    private ?int $idNV;
    private string $phuong_thuc_tt;

    function __construct(
        int $idDH = 0,
        float $tamtinh = 0,
        int $idTT = 0,
        float $phiship = 0,
        string $ngaytao = '',
        string $ngaycapnhat = '',
        int $idTK = 0,
        ?int $idNV = null,
        string $diachi = '',
        string $phuong_thuc_tt = ''
    ) {
        $this->idDH = $idDH;
        $this->tamtinh = $tamtinh;
        $this->idTT = $idTT;
        $this->phiship = $phiship;
        $this->diachi = $diachi;
        $this->ngaytao = $ngaytao;
        $this->ngaycapnhat = $ngaycapnhat;
        $this->idTK = $idTK;
        $this->idNV = $idNV;
        $this->phuong_thuc_tt = $phuong_thuc_tt;
    }

    function nhap(
        int $idDH,
        float $tamtinh,
        float $phiship,
        string $diachi,
        string $ngaytao,
        string $ngaycapnhat,
        int $idTK,
        ?int $idNV,
        int $idTT,
        string $phuong_thuc_tt
    ) {
        $this->idDH = $idDH;
        $this->tamtinh = $tamtinh;
        $this->idTT = $idTT;
        $this->phiship = $phiship;
        $this->diachi = $diachi;
        $this->ngaytao = $ngaytao;
        $this->ngaycapnhat = $ngaycapnhat;
        $this->idTK = $idTK;
        $this->idNV = $idNV;
        $this->phuong_thuc_tt = $phuong_thuc_tt;
    }

    static function getAll()
    {
        $list = [];
        $sql = 'SELECT DISTINCT * FROM donhang
            INNER JOIN trangthaidh ON donhang.idTT = trangthaidh.idTT';
        $con = new Database();
        $req = $con->getAll($sql);

        foreach ($req as $item) {
            $order = new Order();
            $order->nhap(
                $item['idDH'],
                $item['tamtinh'],
                $item['phiship'],
                $item['diachi'],
                $item['ngaytao'],
                $item['ngaycapnhat'],
                $item['idTK'],
                $item['idNV'],
                $item['idTT'],
                $item['phuong_thuc_tt']
            );
            $list[] = $order;
        }
        return $list;
    }

    static function findByID($idDH)
    {
        $list = [];
        $sql = 'SELECT * FROM donhang
            INNER JOIN trangthaidh ON donhang.idTT = trangthaidh.idTT
            WHERE idDH = ' . $idDH;
        $con = new Database();
        $req = $con->getOne($sql);
        if ($req != null) {
            $order = new Order();
            $order->nhap(
                $req['idDH'],
                $req['tamtinh'],
                $req['phiship'],
                $req['diachi'],
                $req['ngaytao'],
                $req['ngaycapnhat'],
                $req['idTK'],
                $req['idNV'],
                $req['idTT'],
                $req['phuong_thuc_tt']
            );
            return $order;
        }
        return null;
    }

    static function getLastestId()
    {
        $sql = 'SELECT MAX(idDH) as idDH FROM donhang';
        $con = new Database();
        $req = $con->getOne($sql);
        return $req['idDH'];
    }

    function saveOrder()
    {
        $sql = "INSERT INTO donhang (
                    tamtinh, idTT, phiship, ngaytao, ngaycapnhat, idTK, idNV, diachi, phuong_thuc_tt
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $con = new Database();
        $stmt = $con->getLink()->prepare($sql);
        $stmt->bind_param(
            "didssiiss",
            $this->tamtinh,
            $this->idTT,
            $this->phiship,
            $this->ngaytao,
            $this->ngaycapnhat,
            $this->idTK,
            $this->idNV,
            $this->diachi,
            $this->phuong_thuc_tt
        );

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Lỗi khi lưu đơn hàng: " . $stmt->error);
        }
    }


    function toArray()
    {
        return [
            'idDH' => $this->idDH,
            'tamtinh' => $this->tamtinh,
            'idTT' => $this->idTT,
            'phiship' => $this->phiship,
            'diachi' => $this->diachi,
            'ngaytao' => $this->ngaytao,
            'ngaycapnhat' => $this->ngaycapnhat,
            'idTK' => $this->idTK,
            'idNV' => $this->idNV,
            'phuong_thuc_tt' => $this->phuong_thuc_tt
        ];
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

    public function getTamtinh()
    {
        return $this->tamtinh;
    }

    public function setTamtinh($tamtinh)
    {
        $this->tamtinh = $tamtinh;
        return $this;
    }

    public function getPhiship()
    {
        return $this->phiship;
    }

    public function setPhiship($phiship)
    {
        $this->phiship = $phiship;
        return $this;
    }

    public function getDiachi()
    {
        return $this->diachi;
    }

    public function setDiachi($diachi)
    {
        $this->diachi = $diachi;
        return $this;
    }

    public function getNgaytao()
    {
        return $this->ngaytao;
    }

    public function setNgaytao($ngaytao)
    {
        $this->ngaytao = $ngaytao;
        return $this;
    }

    public function getNgaycapnhat()
    {
        return $this->ngaycapnhat;
    }

    public function setNgaycapnhat($ngaycapnhat)
    {
        $this->ngaycapnhat = $ngaycapnhat;
        return $this;
    }

    public function getIdTK()
    {
        return $this->idTK;
    }

    public function setIdTK($idTK)
    {
        $this->idTK = $idTK;
        return $this;
    }

    public function getIdNV()
    {
        return $this->idNV;
    }

    public function setIdNV($idNV)
    {
        $this->idNV = $idNV;
        return $this;
    }

    public function getPhuong_thuc_tt()
    {
        return $this->phuong_thuc_tt;
    }

    public function setPhuong_thuc_tt($phuong_thuc_tt)
    {
        $this->phuong_thuc_tt = $phuong_thuc_tt;
        return $this;
    }

    public function getIdTT()
    {
        return $this->idTT;
    }

    public function setIdTT($idTT)
    {
        $this->idTT = $idTT;
        return $this;
    }
}
