<?php
class facture
{
    private ?int $id_facture = null;
    private ?int $id_client = null;
    private ?int $prix = null;
    private ?string $email = null;

    public function __construct($idf,$prix,$email)
    {
        $this->id_facture = $idf;
        $this->prix = $prix;
        $this->email = $email;
    }
    public function getidf()
    {
        return $this->id_facture;
    }
    public function setfn($idf)
    {
        $this->id_facture = $idf;

        return $this;
    }

    public function getidc()
    {
        return $this->id_client;
    }
    public function setidc($idc)
    {
        $this->id_client = $idc;

        return $this;
    }
    public function getprix()
    {
        return $this->prix;
    }
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }
}