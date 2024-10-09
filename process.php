<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit();
}

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header('Location: login.html');
    exit();
}

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

$host_name = filter_input(INPUT_POST, 'host_name', FILTER_SANITIZE_STRING);
$ansible_host = filter_input(INPUT_POST, 'ansible_host', FILTER_VALIDATE_IP);
$access_token = filter_input(INPUT_POST, 'access_token', FILTER_SANITIZE_STRING);
$host_alias = filter_input(INPUT_POST, 'host_alias', FILTER_SANITIZE_STRING);

// Verificação de valores obrigatórios
if (!$host_name || !$ansible_host || !$access_token || !$host_alias) {
    die('Invalid input data.');
}

// Caminho completo para o script Bash
$script_path = '/var/www/html/HostAdder/hosts_script.sh';

$host_name = escapeshellarg($host_name);
$ansible_host = escapeshellarg($ansible_host);
$access_token = escapeshellarg($access_token);
$host_alias = escapeshellarg($host_alias);

// Montando o comando Bash
$command = escapeshellcmd("$script_path $host_name $ansible_host $access_token $host_alias");
$output = shell_exec($command . ' 2>&1');

if ($output === null) {
    error_log("Command execution failed: " . print_r($command, true));
    die('Error executing command.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Host Added</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('wallpaper4.png'); /* Define o wallpaper como fundo */
            background-size: cover; /* Faz a imagem cobrir todo o fundo */
            background-position: center; /* Centraliza a imagem */
            background-repeat: no-repeat; /* Evita que a imagem se repita */
            color: white; /* Define a cor do texto como branco para contraste */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7); /* Fundo semi-transparente para contraste */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        h1 {
            color: #4CAF50;
        }
        pre {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 4px;
            text-align: left;
            max-height: 200px;
            overflow-y: auto;
            color: black; /* Cor do texto dentro do bloco de código */
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container a {
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 4px;
            margin: 0 10px;
            display: inline-block;
        }
        .button-container a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Host Added Successfully!</h1>
        <p>Inclusion log:</p>
        <pre><?php echo htmlspecialchars($output, ENT_QUOTES, 'UTF-8'); ?></pre>

        <div class="button-container">
            <a href="index.php">Add Another Host</a>
            <a href="index.php">Return to Main Page</a>
        </div>
    </div>
</body>
</html>

