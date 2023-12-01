<?php

require_once '../connexion.php';

class relationC
{
    public function showrelations()
    {

        $sql='SELECT * FROM relation';
        $req=config::getConnexion();
        try{
            $liste=$req->query($sql);
            /*echo '<table border="2">';
            echo '<tr>';
            echo '<td>ID de plan</td><td>prix</td><td>id du client affecté</td>';
            echo '</tr>';
            for ($i=0;$i<$liste->num_rows;$i++)
            { 
                echo '<tr>';
                echo '<td>'$liste[$i]->id'</td><td>'$liste[$i]->prix'</td><td>'$liste[$i]->idclient'</td>';
                echo '</tr>';
            }*/
            return $liste;
        }catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }

    }

    function addrelation($relation,$nom)
    {
        $sql = "INSERT INTO relation   
        VALUES (:idp,:idc,(SELECT id FROM service WHERE nom=:nom AND av=1 ))";
        $req = config::getConnexion();
        try {
            $query = $req->prepare($sql);
            $query->execute([
                'idp' => $relation->getidp(),
                'idc' => $relation->getidc(),
                'nom' => $nom
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function deleterelation ($id)
    {
        $sql = "DELETE FROM relation WHERE idp = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showrelation($id)
    {
        $sql = "SELECT * from relation where idc = $id";
        $db = config::getConnexion();
        try {
            $relation=$db->query($sql);
            //$relation = $query->fetch();
            return $relation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
/*
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
    }*/

}


?>