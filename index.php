<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Se o usuário não estiver logado, redirecione para a página de login
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Host to Ansible</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('wallpaper3.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 5px;
            text-align: left;
            width: 100%;
        }
        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        img {
            margin-bottom: 20px;
            width: 100px;
            height: auto;
        }
        footer {
            margin-top: 20px;
            font-size: 14px;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
	 <a href="logout.php" style="color: white; text-decoration: none; background-color: #4CAF50; padding: 8px 15px; border-radius: 4px; margin-bottom: 20px; display: inline-block;">Logout</a>
        <h1>Add Host to Ansible Inventory</h1>

        <!-- Adicionando a imagem logo abaixo do título -->
        <img src="logo.png" alt="Company Logo">

        <form action="process.php" method="POST">
            <label for="host_name">Host Name:</label>
            <input type="text" id="host_name" name="host_name" required>

            <label for="ansible_host">IP Address:</label>
            <input type="text" id="ansible_host" name="ansible_host" required pattern="^(\d{1,3}\.){3}\d{1,3}$" title="Please enter a valid IP address.">

            <label for="access_token">Fortios Access Token:</label>
            <input type="text" id="access_token" name="access_token" required minlength="10">

            <label for="host_alias">Host Alias:</label>
            <input type="text" id="host_alias" name="host_alias" required>

            <input type="submit" value="Add Host">
        </form>
    </div>

    <footer>
	 <a href="logout.php" style="color: white; text-decoration: none;">Logout</a>
    <br>
        Eixo 3 - Desenvolvimento de Sistema para Redes de Computadores - Grupo 2 - 2024 - 2024
    </footer>
</body>
</html>

