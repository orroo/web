<?php

require_once '../model/credentials.php';
require_once '../config.php';


class testC
{
    function addtest($test)
    {
        $sql = "INSERT INTO test
        VALUES (:id, :taille,:type)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $test->getid(),
                'taille' => $test->gettaille(),
                'type' => $test->gettyp(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } 


    

}