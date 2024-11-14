<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Classificação de Idade</title>
</head>
<body>
    <?php
    $idade = $_POST['idade'];

    if ($idade < 18) {
        echo "<h1>Menor de Idade</h1>";
        echo "<img src='menor.png' alt='Menor de Idade'>";
    } elseif ($idade < 60) {
        echo "<h1>Adulto</h1>";
        echo "<img src='adulto.png' alt='Adulto'>";
    } else {
        echo "<h1>Idoso</h1>";
        echo "<img src='idoso.png' alt='Idoso'>";
    }
    ?>
</body>
</html>
