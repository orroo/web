<?php

ini_set('memory_limit', '5000M');

if (!class_exists('Commentaire')) {

    class Commentaire
    {

        private int $id;
        private string $texte;
        private int $idPost;
        private $datePublication;
        private string $idUtilisateur ; 
        private $likes = [];
        private $dislikes = [];


        public function __construct($id, $texte, $idPost, $datePublication, $idUtilisateur)
        {
            
            $this->id = (int)$id;
            $this->texte = $texte !== null ? $texte : '';
            $this->idPost = (int)$idPost;
            $this->datePublication = ($datePublication !== null) ? new DateTime($datePublication) : null;
            $this->idUtilisateur = (string)$idUtilisateur;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getTexte()
        {
            return $this->texte;
        }

        public function getIdPost()
        {
            return $this->idPost;
        }

        public function getDatePublication()
        {
            return $this->datePublication;
        }

        public function getIdUtilisateur()
        {
            return $this->idUtilisateur;
        }


        public function setTexte($texte)
        {
            $this->texte = $texte;
        }

      

        public function setIdPost($idPost)
        {
            $this->idPost = $idPost;
        }

        public function setDatePublication($datePublication)
        {
            $this->datePublication = new DateTime($datePublication);
        }

        public function setIdUtilisateur($idUtilisateur)
        {
            $this->idUtilisateur = $idUtilisateur;
        }

    

  

    
        public function afficherDetails()
        {
            echo "ID : " . $this->id . "<br>";
            echo "Texte : " . $this->texte . "<br>";
            echo "ID du Post : " . $this->idPost . "<br>";
            echo "Date de publication : " . $this->datePublication->format('Y-m-d H:i:s') . "<br>";
            echo "ID de l'Utilisateur : " . $this->idUtilisateur . "<br>";
        }
    }
}
?>
