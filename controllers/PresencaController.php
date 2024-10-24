<?php
require_once('config/Database.php');
require_once('models/presenca.php');

class PresencaController {
    private $presenca;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->presenca = new Presenca($db);
    }

    public function listarPresencasPorAula($id_aula) {
        $stmt = $this->presenca->listarPorAula($id_aula);
        $presencas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/presencas/listar.php';
    }

    public function registrarPresenca() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->presenca->id_aula = $_POST['id_aula'];
            $this->presenca->id_aluno = $_POST['id_aluno'];
            $this->presenca->status_presenca = $_POST['status_presenca'];

            if ($this->presenca->registrar()) {
                header('Location: /presencas/aula/' . $_POST['id_aula']);
            } else {
                echo "Erro ao registrar presença.";
            }
        }
    }
}
