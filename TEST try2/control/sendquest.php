<?php

require_once '../model/addquest.php';
require_once '../config.php';


class questionsC
{
    function addquest($quest)
    {
        $sql = "INSERT INTO questions (typeD, questxt)
        VALUES (:typeD,:questxt)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'typeD' => $quest->gettypeD(),
                'questxt' => $quest->getquestxt()
               
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listquest()
    {
        $sql = "SELECT * FROM questions";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteques($typeD)
    {
        $sql = "DELETE FROM questions WHERE typeD = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $typeD);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
   ?> 