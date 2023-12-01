<?php
    class relation
    {
        private string $idc;
        private int $ids;
        private int $idp;

        public function __construct ($idc , $ids ,$idp)
        {
            $this->idc=$idc;
            $this->ids=$ids;
            $this->idp=$idp;
        }
        public function getidc()
        {
            return $this->idc;
        }

        public function getids()
        {
            return $this->ids;
        }

        public function getidp()
        {
            return $this->idp;
        }
    }     
?>