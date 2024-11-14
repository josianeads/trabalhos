<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}


$username = $_SESSION['username'];

echo 'Bem-vindo ao painel de controle, ' . htmlspecialchars($username) . '!';
?>

<a href="logout.php">Sair</a>
