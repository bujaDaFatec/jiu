<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'jiu';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erro na Conexão: ' . $e->getMessage();
        }

        return $this->conn;
    }
}

$db = new Database();
$conn = $db->connect();

if ($conn) {
    echo "Conexão bem-sucedida!";
} else {
    echo "Falha na conexão.";
}
