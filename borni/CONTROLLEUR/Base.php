
<?php
class Base extends PDO {
    private $servername = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $dbname = 'commentaire';

    public function __construct() {
        try {
            parent::__construct("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>
