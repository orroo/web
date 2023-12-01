<?php
class test
{
    private ?string $type = null;
    private ?string $taille = null;
    private ?string $idT = null;


    public function __construct($type, $taille, $idT)
    {
        $this->type = $type;
        $this->taille = $taille;
        $this->idT = $idT;

    }
    public function gettype()
    {
        return $this->type;
    }
    public function settype($type)
    {
        $this->type = $type;

        return $this;
    }

    public function gettaille()
    {
        return $this->taille;
    }
    public function settaille($taille)
    {
        $this->taille= $taille;

        return $this;
    }

    public function getidT()
    {
        return $this->idT;
    }
    public function setidT($idT)
    {
        $this->idT = $idT;

        return $this;
    }

}

?> 