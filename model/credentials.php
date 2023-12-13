<?php
class credentials
{
    private ?string $full_name = null;
    private ?string $email = null;
    private ?string $address = null;
    private ?string $city = null;
    private ?string $state = null;
    private ?int $zip_code = null;
    private ?string $name_on_card = null;
    private ?int $credit_card_number = null;
    private ?string $exp_date = null;
    private ?int $cw = null;


    public function __construct($fn, $em, $add, $city, $state,$zip, $noc, $ccn,$exp, $cw)
    {
        $this->full_name = $fn;
        $this->email = $em;
        $this->address = $add;
        $this->city = $city;
        $this->state = $state;
        $this->zip_code = $zip;
        $this->name_on_card = $noc;
        $this->credit_card_number = $ccn;
        $this->exp_date = $exp;
        $this->cw = $cw;
    }
    public function getfn()
    {
        return $this->full_name;
    }
    public function setfn($fn)
    {
        $this->full_name = $fn;

        return $this;
    }

    public function getemail()
    {
        return $this->email;
    }
    public function setmail($mail)
    {
        $this->email = $mail;

        return $this;
    }
    public function getaddress()
    {
        return $this->address;
    }
    public function setaddress($address)
    {
        $this->address = $address;

        return $this;
    }
    public function getcity()
    {
        return $this->city;
    }
    public function setcity($city)
    {
        $this->city = $city;

        return $this;
    }
    public function getstate()
    {
        return $this->state;
    }
    public function setstate($state)
    {
        $this->state = $state;

        return $this;
    }
    public function getzip()
    {
        return $this->zip_code;
    }
    public function setzip($zip)
    {
        $this->zip_code = $zip;

        return $this;
    }
    public function getnoc()
    {
        return $this->name_on_card;
    }
    public function setnoc($noc)
    {
        $this->name_on_card = $noc;

        return $this;
    }
    public function getccn()
    {
        return $this->credit_card_number;
    }
    public function setccn($ccn)
    {
        $this->credit_card_number = $ccn;

        return $this;
    }
    public function getexp()
    {
        return $this->exp_date;
    }
    public function setexp($exp)
    {
        $this->exp_date = $exp;

        return $this;
    }
    public function getcw()
    {
        return $this->exp_date;
    }
    public function setcw($cw)
    {
        $this->exp_date = $exp;

        return $this;
    }
}