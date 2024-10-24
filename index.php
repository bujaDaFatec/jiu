<?php
require_once('controllers/AlunoController.php');  // Corrigido de 'controller' para 'controllers'
require_once('controllers/AulaController.php');   // Corrigido de 'controller' para 'controllers'
require_once('controllers/PresencaController.php'); // Corrigido de 'controller' para 'controllers'

// Roteamento Simples
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($url == '/alunos') {
    $controller = new AlunoController();
    $controller->listarAlunos();
} elseif ($url == '/alunos/adicionar') {
    $controller = new AlunoController();
    $controller->adicionarAluno();
} elseif ($url == '/aulas') {
    $controller = new AulaController();
    $controller->listarAulas();
} elseif ($url == '/aulas/adicionar') {
    $controller = new AulaController();
    $controller->adicionarAula();
} elseif (preg_match('/^\/presencas\/aula\/(\d+)$/', $url, $matches)) {
    $controller = new PresencaController();
    $controller->listarPresencasPorAula($matches[1]);
} else {
    echo "Página não encontrada.";
}
