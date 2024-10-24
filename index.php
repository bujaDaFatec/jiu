<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Presenças</title>
    <link rel="stylesheet" href="css/index.css"> <!-- Link para o arquivo CSS -->
</head>
<body>

<header>
    <h1>Sistema de Gestão de Presenças</h1>
    <nav>
        <ul>
            <li><a href="/jiu/alunos/listar.php">Listar Alunos</a></li>
            <li><a href="/jiu/alunos/adicionar.php">Adicionar Aluno</a></li>
            <li><a href="/jiu/aulas/listar.php">Listar Aulas</a></li>
            <li><a href="/jiu/aulas/adicionar.php">Adicionar Aula</a></li>
        </ul>
    </nav>
</header>

<main>
    <?php
    require_once 'controllers/AlunoController.php';
    require_once 'controllers/AulaController.php';
    require_once 'controllers/PresencaController.php';

    // Roteamento Simples
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Remover "index.php" da URL se estiver presente
    $url = str_replace('/jiu/index.php', '', $url);

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
        echo "<p>Página não encontrada.</p>";
    }
    ?>
</main>

</body>
</html>
