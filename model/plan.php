
<?php

    class plan
    {
        private string $id ;
        private float $prix;
        private int $typep;
        private string $idclient;

        public function __construct ($id , $prix ,$t, $idc)
        {
            $this->id=$id;
            $this->prix=$prix;
            $this->typep=$t;
            $this->idclient=$idc;
        }


        public function getid()
        {
            return $this->id;
        }

        public function setid($id)
        {
            $this->id=$id;
            return $this;
        }

        public function getprice()
        {
            return $this->prix;
        }

        public function setprice($p)
        {
            $this->prix=$p;
            return $this;
        }


        public function gettypep()
        {
            return $this->typep;
        }

        public function settypep($t)
        {
            $this->typep=$t;
            return $this;
        }

        public function getidc()
        {
            return $this->idclient;
        }

        public function setidc($idc)
        {
            $this->idclient=$idc;
            return $this;
        }
    }
?>