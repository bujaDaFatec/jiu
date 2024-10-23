<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aula</title>
</head>
<body>
    <h1>Adicionar Aula</h1>
    <form action="/aulas/adicionar" method="POST">
        <label for="data_inicio">Data Início:</label>
        <input type="datetime-local" id="data_inicio" name="data_inicio" required>

        <label for="data_fim">Data Fim:</label>
        <input type="datetime-local" id="data_fim" name="data_fim" required>

        <label for="localizacao">Localização:</label>
        <input type="text" id="localizacao" name="localizacao">

        <label for="recorrencia">Recorrência:</label>
        <select id="recorrencia" name="recorrencia">
            <option value="nenhuma">Nenhuma</option>
            <option value="semanal">Semanal</option>
        </select>

        <label for="dias_semana">Dias da Semana:</label>
        <input type="checkbox" name="dias_semana[]" value="segunda">Segunda
        <input type="checkbox" name="dias_semana[]" value="terça">Terça
        <input type="checkbox" name="dias_semana[]" value="quarta">Quarta
        <input type="checkbox" name="dias_semana[]" value="quinta">Quinta
        <input type="checkbox" name="dias_semana[]" value="sexta">Sexta

        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
