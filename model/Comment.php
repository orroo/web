
<?php
class Comment {
    private ?int $id;
    private string $texte;
    private DateTime $datemessage;

    public function __construct(?int $id, $texte, $datemessage ) {
        $this->id = $id;
        $this->texte = $texte;
        $this->datemessage = new DateTime($datemessage ?? 'now');
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getTexte(): string {
        return $this->texte;
    }

    public function getDatemessage(): string {
        return $this->datemessage->format('Y-m-d H:i:s');
    }

    public function setTexte($texte) {
        $this->texte = $texte;
    }

    public function setDatemessage($datemessage) {
        $this->datemessage = new DateTime($datemessage);
    }
    public function displayDetails(): void {
        echo "ID: " . $this->id . "<br>";
        echo "Comment Text: " . $this->texte . "<br>";
        echo "Timestamp: " . $this->datemessage->format('Y-m-d H:i:s') . "<br>";
    }
}
?>
