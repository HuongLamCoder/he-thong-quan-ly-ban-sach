<?php

class Product
{
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

    // !!! ĐỂ TẠM GIÁ BÁN = GIÁ BÌA
    function __construct(?int $idSach = NULL, string $tuasach = "", string $mota = "", int $tonkho = 0, int $luotban = 0, string $nxb = "", int $namxb = 0, float $giaban = 0, float $giabia = 0, int $trangthai = 1, int $idNCC = 0, string $hinhanh = "", float $trongluong = 0, ?int $idMGG = NULL, array $idTG = [], int $idTL = 0)
    {
        $this->idSach = $idSach;
        $this->tuasach = $tuasach;
        $this->mota = $mota;
        $this->tonkho = $tonkho;
        $this->luotban = $luotban;
        $this->nxb = $nxb;
        $this->namxb = $namxb;
        $this->giaban = $giaban;
        $this->giabia = $giabia;
        $this->trangthai = $trangthai;
        $this->idNCC = $idNCC;
        $this->hinhanh = $hinhanh;
        $this->trongluong = $trongluong;
        $this->idTG = $idTG;
        $this->idMGG = $idMGG;
        $this->idTL = $idTL;
    }

    static function getAll()
    {
        $list = [];
        $sql = 'SELECT * FROM sach';
        $con = new Database();
        $req = $con->getAll($sql);

        foreach ($req as $item) {
            // Lấy danh sách tác giả
            $sql = 'SELECT idTG FROM sach_tacgia WHERE idSach=' . $item['idSach'];
            $reqTG = $con->getAll($sql);
            $idTG = [];
            foreach ($reqTG as $itemTG) {
                $idTG[] = $itemTG['idTG'];
            }
            
            // !!! ĐỂ TẠM GIÁ BÁN = GIÁ BÌA
            $product = new self(
                $item['idSach'],
                $item['tuasach'],
                $item['mota'],
                $item['tonkho'],
                $item['luotban'],
                $item['NXB'],
                $item['namXB'],
                $item['giabia'],
                $item['giabia'],
                $item['trangthai'],
                $item['idNCC'],
                $item['hinhanh'],
                $item['trongluong'],
                null,
                $idTG,
                $item['idTL']
            );
            $list[] = $product;
        }
        return $list;
    }

    function isExist()
    {
        $listTG = implode(',', $this->idTG);
        $sql = 'SELECT s.idSach
            FROM sach s
            JOIN sach_tacgia st ON s.idSach = st.idSach
            WHERE s.tuasach = "' . $this->tuasach . '"
            AND s.namxb = ' . $this->namxb . '
            AND s.giabia = ' . $this->giabia . '
            AND s.idNCC = ' . $this->idNCC . '
            AND s.nxb = "' . $this->nxb . '"';
        if ($this->idSach != null || $this->idSach != 0) $sql .= ' AND s.idSach !=' . $this->idSach . ' ';
        $sql .= 'GROUP BY s.idSach
            HAVING GROUP_CONCAT(st.idTG ORDER BY st.idTG ASC) = "' . $listTG . '"';
        $con = new Database();
        $result = $con->getOne($sql);
        return $result != NULL;
    }

    function add()
    {
        if (!($this->isExist())) {
            $sql = "INSERT INTO sach (tuasach, mota, tonkho, luotban, NXB, namXB, giaban, giabia, trangthai, idNCC, idTL, hinhanh, trongluong)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $con = new Database();

            $stmt = $con->getLink()->prepare($sql);
            $stmt->bind_param('ssiisiddiiisd', $this->tuasach, $this->mota, $this->tonkho, $this->luotban, $this->nxb, $this->namxb, $this->giaban, $this->giabia, $this->trangthai, $this->idNCC, $this->idTL, $this->hinhanh, $this->trongluong);
            $stmt->execute();
            $stmt->close();

            $this->idSach = $this->getLastID();
            $this->addDetail();
            return true;
        }
        return false;
    }

    function update() {
        if (!($this->isExist())) {
            $sql = "UPDATE sach
                    SET tuasach = ?, 
                        mota = ?,
                        NXB = ?, 
                        namXB = ?, 
                        giaban = ?, 
                        giabia = ?, 
                        trangthai = ?, 
                        idNCC = ?, 
                        hinhanh = ?, 
                        trongluong = ?,
                        idMGG = ?,
                        idTL = ? 
                    WHERE idSach = ?";

            $con = new Database();

            $stmt = $con->getLink()->prepare($sql);
            $stmt->bind_param('sssiddiisdiii', $this->tuasach, $this->mota, $this->nxb, $this->namxb, $this->giaban, $this->giabia, $this->trangthai, $this->idNCC, $this->hinhanh, $this->trongluong, $this->idMGG, $this->idTL, $this->idSach);
            $stmt->execute();
            $stmt->close();

            $sql = "DELETE FROM sach_tacgia WHERE idSach = ?";
            $stmt = $con->getLink()->prepare($sql);
            $stmt->bind_param('i', $this->idSach);
            $stmt->execute();
            $stmt->close();

            $this->addDetail();
            return true;
        }
        return false;
    }

    function getLastID()
    {
        $sql = 'SELECT idSach
            FROM sach
            ORDER BY idSach DESC
            LIMIT 1';
        $con = new Database();
        return $con->getOne($sql)['idSach'];
    }

    function addDetail()
    {
        $con = new Database();
        $sql = 'INSERT INTO sach_tacgia(idSach, idTG) VALUES (?, ?)';
        foreach ($this->idTG as $idTG) {
            $stmt = $con->getLink()->prepare($sql);
            $stmt->bind_param('ii', $this->idSach, $idTG);
            $stmt->execute();
            $stmt->close();
        }
    }

    static function getProductImage(int $idSach) {
        $sql = "SELECT hinhanh FROM sach WHERE idSach = {$idSach}";
        $con = new Database();
        $result = $con->getOne($sql);
        return $result['hinhanh'];
    }

    static function getProductAuthors(int $idSach) {
        $sql = "SELECT 	tacgia.* 
                FROM 	tacgia 
                JOIN 	sach_tacgia ON sach_tacgia.idSach = {$idSach}
                WHERE 	sach_tacgia.idTG = tacgia.idTG";
        $con = new Database();
        $result = $con->getAll($sql);
        return $result;
    }

    static function getProductDiscount(int $idSach) {
        $sql = "SELECT 	magiamgia.phantram 
                FROM 	magiamgia
                JOIN 	sach ON sach.idSach = {$idSach}
                WHERE	sach.idMGG = magiamgia.idMGG";
        $con = new Database();
        $result = $con->getOne($sql);
        return $result['phantram'];
    }

    static function getProductDetailByID(int $id) {
        $sql = "SELECT 	sach.*,  ncc.tenNCC, tl.tenTL
                FROM 	sach, nhacungcap ncc, theloai tl
                WHERE 	sach.idSach = {$id}
                AND		sach.idNCC = ncc.idNCC
                AND		sach.idTL = tl.idTL ";
        $con = new Database();
        $result = $con->getOne($sql);

        foreach (Product::getProductAuthors($id) as $author) {
            $result['authors'][] = [
                'idTG' => $author['idTG'],
                'tenTG' => $author['tenTG']
            ];
        }

        if ($result['idMGG'] != null) {
            $result['discount'] = Product::getProductDiscount($id);
        }

        return $result;
    }

    // Getter & Setter
    public function getIdSach(): int
    {
        return $this->idSach;
    }

    public function setIdSach(int $idSach): void
    {
        $this->idSach = $idSach;
    }

    public function getTuasach(): string
    {
        return $this->tuasach;
    }

    public function setTuasach(string $tuasach): void
    {
        $this->tuasach = $tuasach;
    }

    public function getMota(): string
    {
        return $this->mota;
    }

    public function setMota(string $mota): void
    {
        $this->mota = $mota;
    }

    public function getTonkho(): int
    {
        return $this->tonkho;
    }

    public function setTonkho(int $tonkho): void
    {
        $this->tonkho = $tonkho;
    }

    public function getLuotban(): int
    {
        return $this->luotban;
    }

    public function setLuotban(int $luotban): void
    {
        $this->luotban = $luotban;
    }

    public function getNxb(): string
    {
        return $this->nxb;
    }

    public function setNxb(string $nxb): void
    {
        $this->nxb = $nxb;
    }

    public function getNamxb(): int
    {
        return $this->namxb;
    }

    public function setNamxb(int $namxb): void
    {
        $this->namxb = $namxb;
    }

    public function getGiaban(): float
    {
        return $this->giaban;
    }

    public function setGiaban(float $giaban): void
    {
        $this->giaban = $giaban;
    }

    public function getGiabia(): float
    {
        return $this->giabia;
    }

    public function setGiabia(float $giabia): void
    {
        $this->giabia = $giabia;
    }

    public function getTrangthai(): int
    {
        return $this->trangthai;
    }

    public function setTrangthai(int $trangthai): void
    {
        $this->trangthai = $trangthai;
    }

    public function getIdNCC(): int
    {
        return $this->idNCC;
    }

    public function setIdNCC(int $idNCC): void
    {
        $this->idNCC = $idNCC;
    }

    public function getHinhanh(): string
    {
        return $this->hinhanh;
    }

    public function setHinhanh(string $hinhanh): void
    {
        $this->hinhanh = $hinhanh;
    }

    public function getTrongluong(): float
    {
        return $this->trongluong;
    }

    public function setTrongluong(float $trongluong): void
    {
        $this->trongluong = $trongluong;
    }

    public function getIdTG(): array
    {
        return $this->idTG;
    }

    public function setIdTG(array $idTG): void
    {
        $this->idTG = $idTG;
    }

    public function getIdMGG(): ?int
    {
        return $this->idMGG;
    }

    public function setIdMGG(?int $idMGG): void
    {
        $this->idMGG = $idMGG;
    }

    public function getIdTL(): int
    {
        return $this->idTL;
    }

    public function setIdTL(int $idTL): void
    {
        $this->idTL = $idTL;
    }
}

?>