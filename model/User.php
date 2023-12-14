<?php
class register
{
    private ?string $Username = null;
    private ?string $Email = null;
    private ?string $Password = null;
    private ?string $img = null;
    private ?string $bio = null;
    private ?string $country = null;
    private ?string $phone = null;


    public function __construct($Username,$Email,$Password,$img,$bio,$country,$phone){
        $this->Username = $Username;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->img = $img;
        $this->bio = $bio;
        $this->country = $country;
        $this->phone = $phone;
    }
    public function getUsername(){
        return $this->Username;
    }
    public function setUsername($Username){
        $this->Username = $Username;
        return $this;
    }

    public function getbio(){
        return $this->bio;
    }
    public function setbio($bio){
        $this->bio = $bio;
        return $this;
    }
    public function getcountry(){
        return $this->country;
    }
    public function setcountry($country){
        $this->country = $country;
        return $this;
    }
    public function getphone(){
        return $this->phone;
    }
    public function setphone($phone){
        $this->phone = $phone;
        return $this;
    }

    public function getEmail(){
        return $this->Email;
    }
    public function setEmail($Email){
        $this->Email = $Email;
        return $this;
    }
    public function getPassword(){
        return $this->Password;
    }
    public function setPassword($Password){
        $this->Password = $Password;
        return $this;
    }
    public function getimg(){
        return $this->img;
    }
    public function setimg($img){
        $this->img = $img;
        return $this;
    }
}