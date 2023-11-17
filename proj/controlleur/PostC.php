<?php
require 'Base.php';
include '../Model/Post.php';

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
            $newImage = $post->getImage();
            $newVideo = $post->getVideo();
            $newText = $post->getTexte();
            $newIdUtilisateur = $post->getIdUtilisateur();
            

            $query = "UPDATE post SET 
                      image = :image,
                      video = :video,
                      texte = :texte,
                      idUtilisateur = :idUtilisateur,
                      datePublication = :datePublication
                      WHERE id = :id";

            $result = $this->db->prepare($query);
            $result->bindParam(':image', $newImage);
            $result->bindParam(':video', $newVideo);
            $result->bindParam(':texte', $newText);
            $result->bindParam(':idUtilisateur', $newIdUtilisateur);
            $result->bindParam(':datePublication', $newDatePublication);
            $result->bindParam(':id', $postId);
            $result->execute();

            return $result->rowCount() > 0; 
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function InsertPost(Post $post) {
        try {
            $image = $post->getImage();
            $video = $post->getVideo();
            $texte = $post->getTexte();
            $userId = $post->getIdUtilisateur();
            

            $query = "INSERT INTO post (image, video, texte, idUtilisateur, datePublication) 
                      VALUES (:image, :video, :texte, :idUtilisateur, :datePublication)";
            $result = $this->db->prepare($query);
            $result->bindParam(':image', $image);
            $result->bindParam(':video', $video);
            $result->bindParam(':texte', $texte);
            $result->bindParam(':idUtilisateur', $userId);
            $result->bindParam(':datePublication', $datePublication);
            $result->execute();

            return $result->rowCount() > 0; 
        } catch (PDOException $e) {
            $e->getMessage();
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
            $query = "SELECT * FROM post ORDER BY datePublication DESC"; // Tri par date de publication, du plus récent au plus ancien
            $result = $this->db->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            throw new Exception("Erreur lors de la récupération des messages : " . $e->getMessage());
        }
    }
    
    
}




?>
