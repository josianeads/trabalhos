<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

// Verifica se o cookie existe
if (!isset($_COOKIE['user'])) {
    echo 'Você não está autenticado!';
    exit();
}

echo 'Bem-vindo ao painel de controle, ' . htmlspecialchars($_COOKIE['user']) . '!';
?>

<a href="logout.php">Sair</a>
