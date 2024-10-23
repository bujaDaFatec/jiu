<?php
require_once '../config/Database.php';
require_once '../models/Aluno.php';

class AlunoController {
    private $aluno;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->aluno = new Aluno($db);
    }

    public function listarAlunos() {
        $stmt = $this->aluno->listar();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/alunos/listar.php';
    }

    public function adicionarAluno() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->aluno->nome = $_POST['nome'];
            $this->aluno->faixa = $_POST['faixa'];
            $this->aluno->status = $_POST['status'];

            if ($this->aluno->adicionar()) {
                header('Location: /alunos');
            } else {
                echo "Erro ao adicionar aluno.";
            }
        } else {
            include '../views/alunos/adicionar.php';
        }
    }
}
