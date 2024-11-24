<?php
if(isset($_POST['action'])){
    require '../../model/City.php';
    require '../../model/District.php';
    require '../../model/Ward.php';
}
else{
    require '../model/City.php';
    require '../model/District.php';
    require '../model/Ward.php';
}
    class Address{
        private string $sonha;
        private City $city;
        private District $district;
        private Ward $ward;

        function __construct(){
            $this->sonha = '';
            $this->city = new City();
            $this->district = new District();
            $this->ward = new Ward();
        }

        function nhap(string $sonha, int $city, int $district, int $ward){
            $this->setSonha($sonha);
            $this->city = City::findByID($city);
            $this->district = District::findByID($district);
            $this->ward = Ward::findByID($ward);
        }

        function nhapFromString($diachi){
            $diachi = explode(",", $diachi);
            $this->city = City::find($diachi[3]);
            $this->district = District::find($diachi[2], $this->city->getIdTinh());
            $this->ward = Ward::find($diachi[1], $this->district->getIdQuan());
            $this->setSonha($diachi[0]);
        }

        function convertToStore(){
            return $this->sonha.','.$this->ward->getTenxa().','.$this->district->getTenquan().','.$this->city->getTentinh();
        }

        function setSonha(string $sonha){
            $commaPos = strpos($sonha, ',');
            $this->sonha = ($commaPos !== false) ? substr($sonha, 0, $commaPos) : $sonha;
        }

        function toArray(){
            return [
                'sonha' => $this->sonha,
                'city' => $this->city->toArray(),
                'district' => $this->district->toArray(),
                'ward' => $this->ward->toArray()
            ];
        }

        function getIdTinh(){
            return $this->city->getIdTinh();
        }

        function getIdQuan(){
            return $this->district->getIdQuan();
        }
    }

?>