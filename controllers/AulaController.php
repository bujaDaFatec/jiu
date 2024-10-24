<?php
require_once('config/Database.php');
require_once('models/aula.php');

class AulaController {
    private $aula;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->aula = new Aula($db);
    }

    public function listarAulas() {
        $stmt = $this->aula->listar();
        $aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/aulas/listar.php';
    }

    public function adicionarAula() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->aula->data_inicio = $_POST['data_inicio'];
            $this->aula->data_fim = $_POST['data_fim'];
            $this->aula->localizacao = $_POST['localizacao'];
            $this->aula->recorrencia = $_POST['recorrencia'];
            $this->aula->dias_semana = implode(',', $_POST['dias_semana']);

            if ($this->aula->adicionar()) {
                header('Location: /aulas');
            } else {
                echo "Erro ao adicionar aula.";
            }
        } else {
            include '../views/aulas/adicionar.php';
        }
    }
}
