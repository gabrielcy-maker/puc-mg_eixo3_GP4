<?php
session_start();

// Definindo uma lista de usuários e senhas
$users = [
    'diego.duarte' => 'd12345',  
    'debora.duarte' => 'd12345', 
    'gabriel.amaral' => 'g12345', 
    'gabriel.dias' => 'carioca1234',
    'patrick.nyemayer' => 'ManuduBrack1234', 
];

// Captura os dados do formulário de login
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// Verifica se o nome de usuário existe e se a senha está correta
if (isset($users[$username]) && $users[$username] === $password) {
    // Se as credenciais estão corretas, crie uma sessão
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;  // Armazena o nome de usuário na sessão (opcional)
    
    // Redireciona para a página protegida (index.php)
    header('Location: index.php');
    exit();
} else {
    // Se as credenciais são inválidas, exibe uma mensagem de erro
    echo 'Invalid username or password';
}
?>

