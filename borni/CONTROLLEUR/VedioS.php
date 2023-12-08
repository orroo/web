<?php
require 'Base.php';
include '../MODEL/video.php';

class PostC {
    private $db;

    public function __construct() {
        $this->db = new Base(); 
    }

    public function SelecPosts() {
        try {
            $query = $this->db->prepare('SELECT * FROM post');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            
            throw new Exception("Erreur lors de la sélection des posts : " . $e->getMessage());
        }
    }
    

    public function SelectByIdPost(Post $post) {
        try {
            $postId = $post->getId();
            $query = "SELECT * FROM post WHERE id = :id";
            $result = $this->db->prepare($query);
            $result->bindParam(':id', $postId);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            throw new Exception("Erreur lors de la sélection du post par ID : " . $e->getMessage());
        }
    }
    

    public function UpdatePost(Post $post) {
        try {
            $postId = $post->getId();
            $newVideo = $post->getVideo();
            $newText = $post->getTexte();
           
            

            $query = "UPDATE post SET 
                      texte= :texte,
                      video = :video,
                      datePublication = :datePublication
                      WHERE id = :id";

            $result = $this->db->prepare($query);
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
            $video = $post->getVideo();
            $texte = $post->getTexte();
            $datePublication = date('Y-m-d H:i:s');
    
            $query = "INSERT INTO post (video, texte, datePublication) 
                      VALUES (:video, :texte, :datePublication)";
            $result = $this->db->prepare($query);
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
            $postId = $post->getId();
            $query = "DELETE FROM post WHERE id = :id";
            $result = $this->db->prepare($query);
            $result->bindParam(':id', $postId);
            $result->execute();
    
            return $result->rowCount() > 0; 
        } catch (PDOException $e) {
         
            throw new Exception("Erreur lors de la suppression du post : " . $e->getMessage());
        }
    }

   

    public function getMessages() {
        try {
            $query = "SELECT * FROM post ORDER BY datePublication DESC"; 
            $result = $this->db->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            throw new Exception("Erreur lors de la récupération des messages : " . $e->getMessage());
        }
    }
    public function searchPostsByKeyword($keyword) {
        try {
            $query = "SELECT * FROM post WHERE texte LIKE :keyword ORDER BY datePublication DESC";
            $stmt = $this->db->prepare($query);
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