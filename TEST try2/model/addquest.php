<?php
class questions
{
    private ?string $typeD = null;
    private ?string $questxt = null;
    


    public function __construct($typeD, $questxt)
    {
        $this->typeD = $typeD;
        $this->questxt = $questxt;

    }
    public function gettypeD()
    {
        return $this->typeD;
    }
    public function settypeD($typeD)
    {
        $this->typeD = $typeD;

        return $this;
    }

    public function getquestxt()
    {
        return $this->questxt;
    }
    public function setquestxt($questxt)
    {
        $this->questxt= $questxt;

        return $this;
    }

}

?> 