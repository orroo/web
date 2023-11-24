


<?php

class Commentaire {
    
    private $id;
    private $texte;
    private $reaction;
    private $idPost;
    private $idUtilisateur;
    private $datePublication;

    
    public function __construct($texte, $reaction, $idPost, $idUtilisateur) {
      
        $this->texte = $texte;
        $this->reactions = [];
        $this->idPost = $idPost;
        $this->idUtilisateur = $idUtilisateur;
        $this->datePublication = date('Y-m-d H:i:s'); 
    }

    
    public function getId() {
        return $this->id;
    }

    public function getTexte() {
        return $this->texte;
    }

    public function getReactions() {
        return $this->reactions;
    }

    public function getIdPost() {
        return $this->idPost;
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function getDatePublication() {
        return $this->datePublication;
    }

    
    public function setTexte($texte) {
        $this->texte = $texte;
    }

    public function ajouterReaction($reaction) {
        $this->reactions[] = $reaction;
    }

    
    public function afficherDetails() {
        echo "ID : " . $this->id . "<br>";
        echo "Texte : " . $this->texte . "<br>";
        echo "Réaction : " . $this->reaction . "<br>";
        echo "ID du Post : " . $this->idPost . "<br>";
        echo "ID de l'Utilisateur : " . $this->idUtilisateur . "<br>";
        echo "Date de publication : " . $this->datePublication . "<br>";
    }
}




?>
