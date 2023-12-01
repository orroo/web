<?php

require_once '../model/addtest.php';
require_once '../config.php';


class testsC
{
    function addtest($test)
    {
        $sql = "INSERT INTO tests (type, taille, idT)
        VALUES (:type,:taille, :idT)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'type' => $test->gettype(),
                'taille' => $test->gettaille(),
                'idT' => $test->getidT()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listtest()
    {
        $sql = "SELECT * FROM tests";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletetest($type)
    {
        $sql = "DELETE FROM tests WHERE idT = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $type);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function updatetest($test, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE tests SET  
                    taille = :taille, 
                    idT = :idT
                WHERE type= :type'
            );
            
            $query->execute([
                'type' => $id,
                'taille' => $test->gettaille(),
                'idT' => $test->getidT()
            ]);
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


}

?>