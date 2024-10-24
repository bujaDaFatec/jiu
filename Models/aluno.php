<?php
class Aluno {
    private $conn;
    private $table = 'alunos';

    public $id_aluno;
    public $nome;
    public $faixa;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para listar alunos
    public function listar() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para adicionar aluno
    public function adicionar() {
        $query = 'INSERT INTO ' . $this->table . ' (nome, faixa, status) VALUES (:nome, :faixa, :status)';
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->faixa = htmlspecialchars(strip_tags($this->faixa));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':faixa', $this->faixa);
        $stmt->bindParam(':status', $this->status);

        return $stmt->execute();
    }
}
