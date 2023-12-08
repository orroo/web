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
            $datePublication = date('Y-m-d H:i:s');

            $query = "INSERT INTO post (image, video, texte, idUtilisateur, datePublication) 
                      VALUES (:image, :video, :texte, :idUtilisateur, :datePublication)";
            $result = $this->db->prepare($query);
            $result->bindParam(':image', $image);
            $result->bindParam(':video', $video);
            $result->bindParam(':texte', $texte);
            $result->bindParam(':idUtilisateur', $idUtilisateur);
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
            $query = "SELECT * FROM post ORDER BY datePublication DESC"; 
            $result = $this->db->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            throw new Exception("Erreur lors de la récupération des messages : " . $e->getMessage());
        }
    }
    

    public function obtenirIdPostFromDatabase() {
        try {
            // Remplacez "votre_table_post" par le nom réel de votre table post
            $query = $this->db->prepare('SELECT id FROM votre_table_post LIMIT 1');
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                return $result['id'];
            } else {
                // Si la table post est vide, vous pouvez renvoyer une valeur par défaut ou gérer l'erreur comme vous le souhaitez
                return 1; // Valeur par défaut, ajustez selon vos besoins
            }
        } catch (PDOException $e) {
            // Gérez l'erreur selon vos besoins
            throw new Exception("Erreur lors de l'obtention de l'ID du post : " . $e->getMessage());
        }
    }
    

    public function searchPostsAndComments($searchTerm) {
        try {
            $conn = $this->db;
    
            $sql = "SELECT post.*, comments.id AS comment_id, comments.texte AS comments_texte,comments.datePublication AS comments_date, comments.idUtilisateur AS idtt
                    FROM post
                    INNER JOIN comments ON post.id = comments.idPost
                    WHERE post.idUTilisateur LIKE :searchTerm";
    
            $result = $conn->prepare($sql);
    
            $searchTerm = '%' . $searchTerm . '%';
            $result->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    
            $result->execute();
    
            return $result;

        

        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la recherche de posts et commentaires : " . $e->getMessage());
        }
    }







    }


   
    
    

    
   
    

    


    



?>
