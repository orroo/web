<?php

require_once '../model/credentials.php';
require_once '../config.php';


class credentialsC
{
    function addcred($cred)
    {
        $sql = "INSERT INTO credentials  
        VALUES (id_user,:full_name, :email,:address,:city,:state,:zip_code,:name_on_card,:credit_card_number,:exp_date,:cw)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'full_name' => $cred->getfn(),
                'email' => $cred->getemail(),
                'address' => $cred->getaddress(),
                'city' => $cred->getcity(),
                'state' => $cred->getstate(),
                'zip_code' => $cred->getzip(),
                'name_on_card' => $cred->getnoc(),
                'credit_card_number' => $cred->getccn(),
                'exp_date' => $cred->getexp(),
                'cw' => $cred->getcw()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listcred()
    {
        $sql = "SELECT * FROM credentials";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletecred($ide)
    {
        $sql = "DELETE FROM credentials WHERE full_name = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function updatecred($cred, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE credentials SET 
                    email = :email, 
                    address = :address, 
                    city = :city,
                    state = :state, 
                    zip_code = :zip, 
                    name_on_card = :noc, 
                    credit_card_number = :ccn,
                    exp_date = :exp, 
                    cw = :cw
                WHERE full_name= :fname'
            );
            
            $query->execute([
                'fname' => $id,
                'email' => $cred->getemail(),
                'address' => $cred->getaddress(),
                'city' => $cred->getcity(),
                'state' => $cred->getstate(),
                'zip' =>$cred->getzip(),
                'noc' => $cred->getnoc(),
                'ccn' => $cred->getccn(),
                'exp' => $cred->getexp(),
                'cw' => $cred->getcw()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showcred($mail)
    {
        $sql = "SELECT * FROM credentials where email = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $mail);
        try {
             $req->execute();
             $liste= $req->fetch();
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}

