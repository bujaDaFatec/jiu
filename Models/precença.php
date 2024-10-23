<?php
class Presenca {
    private $conn;
    private $table = 'presenca';

    public $id_presenca;
    public $id_aula;
    public $id_aluno;
    public $status_presenca;
    public $data_registro;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listarPorAula($id_aula) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_aula = :id_aula';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_aula', $id_aula);
        $stmt->execute();
        return $stmt;
    }

    public function registrar() {
        $query = 'INSERT INTO ' . $this->table . ' (id_aula, id_aluno, status_presenca) VALUES (:id_aula, :id_aluno, :status_presenca)';
        $stmt = $this->conn->prepare($query);

        $this->id_aula = htmlspecialchars(strip_tags($this->id_aula));
        $this->id_aluno = htmlspecialchars(strip_tags($this->id_aluno));
        $this->status_presenca = htmlspecialchars(strip_tags($this->status_presenca));

        $stmt->bindParam(':id_aula', $this->id_aula);
        $stmt->bindParam(':id_aluno', $this->id_aluno);
        $stmt->bindParam(':status_presenca', $this->status_presenca);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
