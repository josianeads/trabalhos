<?php
session_start();

// Destrói a sessão
session_unset();
session_destroy();

// Remove o cookie
setcookie('user', '', time() - 3600);

header('"Location: login.php'");
exit();
?>
