<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tabuada</title>
</head>
<body>
    <?php
    $numero = $_POST['numero'];

    echo "<h1>Tabuada do $numero</h1>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<p>$numero x $i = " . ($numero * $i) . "</p>";
    }
    ?>
</body>
</html>
