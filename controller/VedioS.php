<?php
require_once '../connexion.php';
include_once '../model/video.php';

class PostC {

    public function SelecPosts() {
        try {
            
            $db=config::getConnexion();
            $query = $db->prepare('SELECT * FROM videos');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            
            throw new Exception("Erreur lors de la sélection des posts : " . $e->getMessage());
        }
    }
    

    public function SelectByIdPost(Post $post) {
        try {
            
            $db=config::getConnexion();
            $postId = $post->getId();
            $query = "SELECT * FROM videos WHERE id = :id";
            $result = $db->prepare($query);
            $result->bindParam(':id', $postId);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            throw new Exception("Erreur lors de la sélection du post par ID : " . $e->getMessage());
        }
    }
    

    public function UpdatePost(Post $post) {
        try {
            
            $db=config::getConnexion();
            $postId = $post->getId();
            $newVideo = $post->getVideo();
            $newText = $post->getTexte();
           
            

            $query = "UPDATE videos SET 
                      texte= :texte,
                      video = :video,
                      datePublication = :datePublication
                      WHERE id = :id";

            $result = $db->prepare($query);
            $result->bindParam(':video', $newVideo);
            $result->bindParam(':datePublication', $newDatePublication);
            $result->bindParam(':texte', $texte);
            $result->bindParam(':id', $postId);
            $result->execute();

            return $result->rowCount() > 0; 
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function InsertPost(Post $post) {
        try {
            
            $db=config::getConnexion();
            $video = $post->getVideo();
            $texte = $post->getTexte();
            $datePublication = date('Y-m-d H:i:s');
    
            $query = "INSERT INTO videos (video, texte, datePublication) 
                      VALUES (:video, :texte, :datePublication)";
            $result = $db->prepare($query);
            $result->bindParam(':video', $video);
            $result->bindParam(':datePublication', $datePublication);
            $result->bindParam(':texte', $texte);
            $result->execute();
    
            return $result->rowCount() > 0; 
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; // Ajout d'une gestion d'erreur
        }
    }
    

    public function DeletePost(Post $post) {
        try {
            
            $db=config::getConnexion();
            $postId = $post->getId();
            $query = "DELETE FROM videos WHERE id = :id";
            $result = $db->prepare($query);
            $result->bindParam(':id', $postId);
            $result->execute();
    
            return $result->rowCount() > 0; 
        } catch (PDOException $e) {
         
            throw new Exception("Erreur lors de la suppression du post : " . $e->getMessage());
        }
    }

   

    public function getMessages() {
        try {
            
            $db=config::getConnexion();
            $query = "SELECT * FROM videos ORDER BY datePublication DESC"; 
            $result = $db->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            throw new Exception("Erreur lors de la récupération des messages : " . $e->getMessage());
        }
    }
    public function searchPostsByKeyword($keyword) {
        try {
            
            $db=config::getConnexion();
            $query = "SELECT * FROM videos WHERE texte LIKE :keyword ORDER BY datePublication DESC";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la recherche des posts : " . $e->getMessage());
        }
    }

   
    

  
    }



    
    
    
    

    
   
    

    


    



?>