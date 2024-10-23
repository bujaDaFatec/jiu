<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aulas</title>
</head>
<body>
    <h1>Lista de Aulas</h1>
    <ul>
        <?php foreach ($aulas as $aula): ?>
            <li>Data: <?php echo $aula['data_inicio']; ?> - Local: <?php echo $aula['localizacao']; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="/aulas/adicionar">Adicionar Nova Aula</a>

    <h1>Lista de Aulas</h2>
    
</body>
</html>
