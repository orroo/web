
<?php

    class service
    {
        private string $id ;
        private string $nom ;
        private float $prix;
        private string $description ;
        private bool $AV ;


        public function __construct ($id ,$nom, $prix , $des , $v)
        {
            $this->id=$id;
            $this->nom=$nom;
            $this->prix=$prix;
            $this->description=$des;
            $this->AV=$v;
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

        public function getnom()
        {
            return $this->nom;
        }

        public function setnom($nom)
        {
            $this->nom=$nom;
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

        public function getdes()
        {
            return $this->description;
        }

        public function setdes($des)
        {
            $this->description=$des;
            return $this;
        }

        public function getv()
        {
            return $this->AV;
        }

        public function setv($v)
        {
            $this->AV=$v;
            return $this;
        }
    }
?>