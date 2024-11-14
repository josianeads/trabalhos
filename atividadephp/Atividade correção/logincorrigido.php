<?php
session_start();
function get_user($username) {
    return [
        'username' => 'user',
        'password' => password_hash('password123', PASSWORD_DEFAULT) 
    ];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user_data = get_user($username);

   
    if ($user_data && password_verify($password, $user_data['password'])) {
     
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        setcookie('user', $username, [
            'expires' => time() + 3600,
            'path' => '/',
            'domain' => '', 
            'secure' => true, 
            'httponly' => true, 
            'samesite' => 'Strict'
        ]);

        header('Location: dashboard.php');
        exit();
    } else {
        echo 'Usuário ou senha incorretos!';
    }
}
?>

<form method="post" action="">
    <label for="username">Usuário:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Senha:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <input type="submit"
