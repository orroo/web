<?php

require_once '../connexion.php';

class serviceC
{
    public function showservices()
    {

        $sql='SELECT * FROM service';
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

    function addservice($service)
    {
        $sql = "INSERT INTO service   
        VALUES (:id,:nom , :prix,:description, :av)";
        $req = config::getConnexion();
        try {
            $query = $req->prepare($sql);
            $query->execute([
                'id' => $service->getid(),
                'nom' => $service->getnom(),
                'prix' => $service->getprice(),
                'description' => $service->getdes(),
                'av' => $service->getv()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function deleteservice ($id)
    {
        $sql = "DELETE FROM service WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showservice($id)
    {
        $sql = "SELECT * from service where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $ser = $query->fetch();
            return $ser;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showservicename($name)
    {
        $sql = "SELECT * from service where nom=$name";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $ser = $query->fetch();
            return $ser;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateser($ser, $id)
    {   
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare(
                'UPDATE service SET 
                    prix = :prix,
                    nom = :nom,
                    description = :description,
                    av = :av 
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'prix' => $ser->getprice(),
                'nom' => $ser->getnom(),
                'description' => $ser->getdes(),
                'av' => $ser->getv()
            ]);

            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function MI()
    {
        $sql = "SELECT MAX(id) as max from service ";
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