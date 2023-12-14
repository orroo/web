<?php
require_once '../model/facture.php';
require_once '../connexion.php';


class factureC
{
    function addfact($fact)
    {
        $sql = "INSERT INTO facture VALUES
        (:id_facture,(SELECT id_user  from credentials WHERE email=:uemail),:prix,:email)";
        
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_facture' => $fact->getidf(),
                'prix' => $fact->getprix(),
                'uemail' => $fact->getemail(),
                'email' => $fact->getemail()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listfact()
    {
        $sql = "SELECT * FROM facture";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletefact($idf)
    {
        $sql = "DELETE FROM facture WHERE id_facture  = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idf);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function showfac($fact)
    {
        $sql = "SELECT * FROM facture where id_facture = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $fact);
        try {
             $req->execute();
             $liste= $req->fetch();
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function MI()
    {
        $sql = "SELECT MAX(id_facture) as max from facture ";
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