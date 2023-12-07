<?php

require_once '../connexion.php';

class planC
{
    public function showplans()
    {

        $sql='SELECT * FROM plan';
        $req=config::getConnexion();
        try{
            $liste=$req->query($sql);
            return $liste;
        }catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }

    }

    function addplan($plan)
    {
        $sql = "INSERT INTO plan   
        VALUES (:id, :prix,:typep, :ic)";
        $req = config::getConnexion();
        try {
            $query = $req->prepare($sql);
            $query->execute([
                'id' => $plan->getid(),
                'prix' => $plan->getprice(),
                'typep' => $plan->gettypep(),
                'ic' => $plan->getidc(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function deleteplan ($id)
    {
        $sql = "DELETE FROM plan WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showplan($id)
    {
        $sql = "SELECT * from plan where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $plan = $query->fetch();
            return $plan;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateplan($plan, $id)
    {   
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare(
                'UPDATE plan SET 
                    prix = :prix,
                    type = :type,
                    idc = :idc 
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'prix' => $plan->getprice(),
                'type' => $plan->gettypep(),
                'idc' => $plan->getidc()
            ]);

            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function MI()
    {
        $sql = "SELECT MAX(id) as max from plan ";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $id = $query->fetch();

            if (isset($id['max']))
                return $id['max'];
            else 

                echo 'ERRROR';
                return 0;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}


?>