<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
</head>
<body>
    <h1>Adicionar Aluno</h1>
    <form action="/alunos/adicionar" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="faixa">Faixa:</label>
        <select id="faixa" name="faixa" required>
            <option value="branca">Branca</option>
            <option value="azul">Azul</option>
            <option value="roxa">Roxa</option>
            <option value="marrom">Marrom</option>
            <option value="preta">Preta</option>
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>

        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
