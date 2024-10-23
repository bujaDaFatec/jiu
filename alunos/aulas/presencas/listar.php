<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Presenças</title>
</head>
<body>
    <h1>Presenças para a Aula</h1>
    <ul>
        <?php foreach ($presencas as $presenca): ?>
            <li>Aluno: <?php echo $presenca['id_aluno']; ?> - Status: <?php echo $presenca['status_presenca']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
