<?php
require 'Base.php';
include_once '../MODEL/Comment.php';

class CommentC {
    private $db;

    public function __construct() {
        $this->db = new Base(); 
    }

    public function insertComment(Comment $comment) {
        try {
            $commentText = $comment->getTexte();
            $timestamp = $comment->getDatemessage();

            $query = "INSERT INTO commentaire (texte, datemessage) 
                      VALUES (:comment_text, :timestamp)";
            $result = $this->db->prepare($query);
            $result->bindParam(':comment_text', $commentText);
            $result->bindParam(':timestamp', $timestamp);
            $result->execute();

            return $result->rowCount() > 0; 
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'insertion du commentaire : " . $e->getMessage());
        }
    }
    
    public function updateComment(Comment $comment) {
        try {
            $id = $comment->getId();
            $text = $comment->getTexte();

            $query = "UPDATE commentaire SET texte = :text WHERE id = :id";
            $result = $this->db->prepare($query);
            $result->bindParam(':text', $text);
            $result->bindParam(':id', $id);
            $result->execute();

            return $result->rowCount() > 0; 
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la mise à jour du commentaire : " . $e->getMessage());
        }
    }

    public function deleteComment(Comment $comment) {
        try {
            $id = $comment->getId();
            $query = "DELETE FROM commentaire WHERE id = :id";
            $result = $this->db->prepare($query);
            $result->bindParam(':id', $id);
            $result->execute();

            return $result->rowCount() > 0; 
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression du commentaire : " . $e->getMessage());
        }
    }

    public function getComments() {
        try {
            $query = "SELECT * FROM commentaire ORDER BY datemessage DESC"; // Tri par date de message, du plus récent au plus ancien
            $result = $this->db->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des commentaires : " . $e->getMessage());
        }
    }
    public function getVideos() {
        try {
            $query = "SELECT * FROM videos";
            $result = $this->db->query($query);
            $videos = $result->fetchAll(PDO::FETCH_ASSOC);

            // Convert the fetched data into Video objects
            $videoObjects = [];
            foreach ($videos as $video) {
                $videoObjects[] = new Video(
                    $video['id'],
                    $video['url_video'],
                    $video['nom_video'],
                    $video['type_video'],
                    $video['duree_video']
                );
            }

            return $videoObjects;
        } catch (PDOException $e) {
            throw new Exception("Error retrieving videos: " . $e->getMessage());
        }
    }

}

?>