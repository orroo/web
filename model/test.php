<?php
class test
{
    private ?string $id = null;
    private ?string $taille = null;
    private ?string $type = null;

public function __construct($id, $taille, $typ)
{
    $this->id = $id;
    $this->taille = $taille;
    $this->type= $typ;
}
public function getid()
{
    return $this->id;
}
public function setid($id)
{
    $this->id = $id;

    return $this;
}

public function gettaille()
{
    return $this->taille;
}
public function settaille($taille)
{
    $this->id = $taille;

    return $this;
}

public function gettype()
{
    return $this->type;
}
public function settype($typ)
{
    $this->id = $typ;

    return $this;
}
}

?>