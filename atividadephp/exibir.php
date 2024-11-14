<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exibir Dados</title>
</head>
<body>
    <?php
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cidade = $_POST['cidade'];

    echo "<h1>Dados Recebidos</h1>";
    echo "<p>Nome: $nome</p>";
    echo "<p>Idade: $idade</p>";
    echo "<p>Cidade Natal: $cidade</p>";
    ?>
</body>
</html>
