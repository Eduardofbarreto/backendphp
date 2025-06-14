<?php
session_start(); // Inicia a sessão para verificar o status do login

// Verifica se a variável de sessão 'loggedin_unico' está definida e é verdadeira
if (!isset($_SESSION['loggedin_unico']) || $_SESSION['loggedin_unico'] !== true) {
    header('Location: index.html'); // Se não estiver logado, redireciona para a página de login
    exit; // Garante que o script pare
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Restrita</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <div class="container">
        <h1>Bem-vindo à Área Secreta!</h1>
        <p>Olá, **<?php echo htmlspecialchars($_SESSION['username_unico']); ?>**.</p>
        <p>Você acessou esta página com sucesso, ela é visível apenas para o usuário autenticado.</p>
        <p>
            <a href="logout_unico.php" style="
                background-color: #dc3545; /* Cor vermelha para o botão Sair */
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                text-decoration: none;
                cursor: pointer;
                transition: background-color 0.3s ease;
            ">Sair</a>
        </p>
    </div>
</body>
</html>