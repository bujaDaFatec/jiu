<?php
class Aula {
    private $conn;
    private $table = 'aulas';

    public $id_aula;
    public $data_inicio;
    public $data_fim;
    public $localizacao;
    public $recorrencia;
    public $dias_semana;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function adicionar() {
        $query = 'INSERT INTO ' . $this->table . ' (data_inicio, data_fim, localizacao, recorrencia, dias_semana) VALUES (:data_inicio, :data_fim, :localizacao, :recorrencia, :dias_semana)';
        $stmt = $this->conn->prepare($query);

        $this->data_inicio = htmlspecialchars(strip_tags($this->data_inicio));
        $this->data_fim = htmlspecialchars(strip_tags($this->data_fim));
        $this->localizacao = htmlspecialchars(strip_tags($this->localizacao));
        $this->recorrencia = htmlspecialchars(strip_tags($this->recorrencia));
        $this->dias_semana = htmlspecialchars(strip_tags($this->dias_semana));

        $stmt->bindParam(':data_inicio', $this->data_inicio);
        $stmt->bindParam(':data_fim', $this->data_fim);
        $stmt->bindParam(':localizacao', $this->localizacao);
        $stmt->bindParam(':recorrencia', $this->recorrencia);
        $stmt->bindParam(':dias_semana', $this->dias_semana);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
