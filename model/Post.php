



<?php
ini_set('memory_limit', '5000M');


if (!class_exists('Post')) {

class Post {
  
    private  int $id;
    private string $image;
    private string $video;
    private string $texte;
    
    private string $idUtilisateur;
    private dateTime $datePublication;
    
   
    public function __construct($id,$image, $video, $texte, $idUtilisateur) {
        $this->id = (int)$id;
        $this->image = $image !== null ? $image : '';
        $this->texte = $texte !== null ? $texte : '';
        $this->video = $video !== null ? $video : '';
       
       
        $this->idUtilisateur = $idUtilisateur;
    }
   
    
    public function getId() {
        return $this->id;
    }

    public function getImage() {
        return $this->image;
    }

    public function getVideo() {
        return $this->video;
    }

    public function getTexte() {
        return $this->texte;
    }

  

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function getDatePublication() {
        return $this->datePublication;
    }


    

    public function setImage($image) {
         $this->image = $image;
    }

    public function setVideo($video) {
        $this->video = $video;
    }



    public function setTexte($texte) {
          $this->texte = $texte;
    }


    public function setIdUtilisateur($idUtilisateur) {
          $this->idUtilisateur = $idUtilisateur;
    }

   
   

    
    public function afficherDetails() {
        echo "ID : " . $this->id . "<br>";
        echo "Texte : " . $this->texte . "<br>";
        echo "Image : " . $this->image . "<br>";
        echo "Vedio : " . $this->vedio . "<br>";
       
        echo "ID du Post : " . $this->idPost . "<br>";
        echo "ID de l'Utilisateur : " . $this->idUtilisateur . "<br>";
        echo "Date de publication : " . $this->datePublication . "<br>";
    }
}
}


?>




