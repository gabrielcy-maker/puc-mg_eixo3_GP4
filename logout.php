<?php
session_start();
session_destroy();  // Destrói a sessão atual
header('Location: login.html');  // Redireciona para a página de login
exit();
