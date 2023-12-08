<?php
require 'Base.php';
include '../model/Comentaire.php';


class CommentaireC {
    private $db;

    public function __construct() {
        $this->db = new Base(); 
    }

    public function obtenirIdPost() {
        return $idPost = isset($_GET['id']) ? $_GET['id'] : null;
    }
    






 
    
   

    public function SelectByIdPost(Commentaire $post) {
        try {
            $postId = $post->getId();
            $query = "SELECT * FROM comments WHERE idPost = :postId";
            $result = $this->db->prepare($query);
            $result->bindParam(':postId', $postId);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la sélection du post par ID : " . $e->getMessage());
        }
    }
    


    






    public function InsertCommentaire(Commentaire $commentaire) {
        try {
            $texte = $commentaire->getTexte();
            $idPost = $commentaire->getIdPost();
            $idUt = $commentaire->getIdUtilisateur();

            // Obtenez la date et l'heure actuelles au format SQL
            $datePublication = date('Y-m-d H:i:s');

            $query = "INSERT INTO comments (texte, idPost, idUtilisateur, datePublication) 
                      VALUES (:texte, :idPost, :idUtilisateur, :datePublication)";
            $result = $this->db->prepare($query);
            $result->bindParam(':texte', $texte);
            $result->bindParam(':idPost', $idPost);
            $result->bindParam(':idUtilisateur', $idUtilisateur);
            $result->bindParam(':datePublication', $datePublication);
            $result->execute();

            return $result->rowCount() > 0; 
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'insertion du commentaire : " . $e->getMessage());
        }
    }

    public function DeleteCommentaire(Commentaire $commentaireId) {
        try {
            $com = $commentaireId->getId();
            $idPost = $commentaireId->getIdPost(); // Utilisez la méthode pour récupérer l'ID du post
            $query = "DELETE FROM comments WHERE id = :id";
            $result = $this->db->prepare($query);
            $result->bindParam(':id', $com);
            $result->execute();
    
            if ($result->rowCount() > 0) {
                // Commentaire supprimé avec succès, rediriger vers la page précédente
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
                exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
            } else {
                // Aucun commentaire supprimé
                echo "Aucun commentaire supprimé.";
            }
        } catch (PDOException $e) {
            echo "Erreur MySQL : " . $e->getMessage();
            throw new Exception("Erreur lors de la suppression du commentaire : " . $e->getMessage());
        }
    }
    

    public function UpdateCommentaire($commentaireId, $updatedText) {
        try {
            
            $query = "UPDATE comments SET texte = :updatedText WHERE id = :commentaireId";
            $result = $this->db->prepare($query);
            $result->bindParam(':updatedText', $updatedText);
            $result->bindParam(':commentaireId', $commentaireId);
            $result->execute();
    
            if ($result->rowCount() > 0) {
                // Commentaire mis à jour avec succès, rediriger vers la page précédente
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
                exit(); 
            } else {
                // Aucun commentaire mis à jour
                echo "Aucun commentaire mis à jour.";
            }
        } catch (PDOException $e) {
            echo "Erreur MySQL : " . $e->getMessage();
            throw new Exception("Erreur lors de la mise à jour du commentaire : " . $e->getMessage());
        }
    }
    




    public function getIdPostById($commentId) {
        try {
            $query = "SELECT idPost FROM comments WHERE id = :id";
            $result = $this->db->prepare($query);
            $result->bindParam(':id', $commentId);
            $result->execute();

            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return $row['idPost'];
            } else {
                return null; 
            }
        } catch (PDOException $e) {
           
            echo "Erreur MySQL : " . $e->getMessage();
            return null;
        }
    }


    public function SelectCommentairesByPostId($postId) {
        try {
            $query = "SELECT * FROM comments WHERE idPost = :postId";
            $result = $this->db->prepare($query);
            $result->bindParam(':postId', $postId);
            $result->execute();
    
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur MySQL : " . $e->getMessage();
            throw new Exception("Erreur lors de la sélection des commentaires : " . $e->getMessage());
        }
    }




    public function SelectCommentaires() {
        try {
            $query = $this->db->prepare('
                SELECT comments.id, comments.texte, comments.idPost, comments.idUtilisateur, comments.datePublication
                FROM comments
                LEFT JOIN post ON comments.idPost = post.id
            ');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la sélection des commentaires : " . $e->getMessage());
        }
    }


}






?>
