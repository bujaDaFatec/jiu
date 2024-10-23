<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Lista de Alunos</h1>
    <ul>
        <?php foreach ($alunos as $aluno): ?>
            <li><?php echo $aluno['nome']; ?> - Faixa: <?php echo $aluno['faixa']; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="/alunos/adicionar">Adicionar Novo Aluno</a>
</body>
</html>
