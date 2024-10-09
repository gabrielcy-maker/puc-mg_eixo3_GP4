<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host_name = $_POST['host_name'] ?? '';
$ansible_host = $_POST['ansible_host'] ?? '';
$access_token = $_POST['access_token'] ?? '';
$host_alias = $_POST['host_alias'] ?? '';

// Caminho completo para o dotnet
$dotnet_path = '/usr/local/dotnet/dotnet';

$command = "$dotnet_path run --project /var/www/html/HostAdder/HostAdder.csproj $host_name $ansible_host $access_token $host_alias";
$output = shell_exec($command . ' 2>&1');

// Exibe o layout melhorado com as opções para adicionar outro host ou retornar à página principal
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
            background-image: url('wallpaper.png'); /* Define o wallpaper como fundo */
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
        <pre><?php echo htmlspecialchars($output); ?></pre>

        <div class="button-container">
            <a href="index.html">Add Another Host</a>
            <a href="index.html">Return to Main Page</a>
        </div>
    </div>
</body>
</html>

