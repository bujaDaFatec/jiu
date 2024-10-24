<?php
class AlunoController {
    public function listarAlunos() {
        // Inclui o arquivo do modelo de aluno
        require_once 'models/aluno.php';

        // Inclui o arquivo de conexão com o banco de dados
        require_once 'config/Database.php';

        // Cria uma nova instância do banco de dados
        $database = new Database();
        $db = $database->connect();

        // Instancia o modelo de Aluno
        $alunoModel = new Aluno($db);

        // Obtém os alunos
        $stmt = $alunoModel->listar();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Converte o resultado para array associativo

        // Verifica se há alunos retornados
        if (!$alunos) {
            $alunos = [];
        }

        // Inclui a view e passa a variável $alunos para ela
        include 'views/alunos/listar.php';
    }

    public function adicionarAluno() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Inclui o arquivo do modelo de aluno
            require_once 'models/aluno.php';

            // Inclui o arquivo de conexão com o banco de dados
            require_once 'config/Database.php';

            // Cria uma nova instância do banco de dados
            $database = new Database();
            $db = $database->connect();

            // Instancia o modelo de Aluno
            $alunoModel = new Aluno($db);

            // Define as propriedades do aluno com base nos dados do formulário
            $alunoModel->nome = $_POST['nome'];
            $alunoModel->faixa = $_POST['faixa'];
            $alunoModel->status = $_POST['status'];

            // Tenta adicionar o aluno
            if ($alunoModel->adicionar()) {
                header('Location: /jiu/alunos');
                exit;
            } else {
                echo 'Erro ao adicionar aluno.';
            }
        }

        // Inclui a view do formulário de adição de aluno
        include 'views/alunos/adicionar.php';
    }
}
