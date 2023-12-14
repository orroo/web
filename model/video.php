<?php
ini_set('memory_limit', '5000M');

if (!class_exists('Post')) {
    class Post {
        private int $id;
        private string $video;
        private string $texte;
        private ?DateTime $datePublication;

        public function __construct($id, $video, $texte, $datePublication = null) {
            $this->id = (int)$id;
            $this->video = $video !== null ? $video : '';
            $this->texte = $texte !== null ? $texte : '';
            $this->datePublication = $datePublication instanceof DateTime ? $datePublication : null;
        }

        public function getId() {
            return $this->id;
        }

        public function getVideo() {
            return $this->video;
        }

        public function getTexte() {
            return $this->texte;
        }

        public function getDatePublication() {
            return $this->datePublication;
        }

        public function setVideo($video) {
            $this->video = $video;
        }

        public function setTexte($texte) {
            $this->texte = $texte;
        }

        public function setDatePublication(DateTime $datePublication) {
            $this->datePublication = $datePublication;
        }

        public function afficherDetails() {
            echo "ID : " . $this->id . "<br>";
            echo "Vidéo : " . $this->video . "<br>";
            echo "Texte : " . $this->texte . "<br>";
            echo "Date de publication : " . ($this->datePublication ? $this->datePublication->format('Y-m-d H:i:s') : 'Non définie') . "<br>";
        }
    }
}
?>
