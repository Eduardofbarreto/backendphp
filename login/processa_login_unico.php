<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // Sempre inicie a sessão no topo do arquivo PHP

// --- CONFIGURAÇÃO DO USUÁRIO ÚNICO ---
// Defina o nome de usuário permitido
$usuario_permitido = 'admin';

// Defina o HASH da senha permitida.
// Para gerar este hash, crie um arquivo temporário (ex: gerar_hash.php) com:
// <?php echo password_hash('SUA_SENHA_SECRETA_AQUI', PASSWORD_DEFAULT); ? >
// Execute-o no navegador, copie o hash gerado e cole-o abaixo.
// NÃO USE SENHA EM TEXTO PURO OU O HASH DO EXEMPLO!
$senha_hash_permitida = 'admin'; // SUBSTITUA POR UM HASH REAL E SEGURO!

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? ''; // Pega o usuário enviado
    $password = $_POST['password'] ?? ''; // Pega a senha enviada

    // Verifica se o nome de usuário corresponde E se a senha digitada corresponde ao hash armazenado
    if ($username === $usuario_permitido && password_verify($password, $senha_hash_permitida)) {
        // Login bem-sucedido!
        $_SESSION['loggedin_unico'] = true; // Define uma variável de sessão para indicar que está logado
        $_SESSION['username_unico'] = $username; // Armazena o nome de usuário na sessão
        header('Location: pagina_restrita.php'); // Redireciona para a página restrita
        exit; // Garante que o script pare de executar após o redirecionamento
    } else {
        // Usuário ou senha incorretos
        $_SESSION['erro_login'] = 'Usuário ou senha incorretos.';
        header('Location: index.html'); // Redireciona de volta para a página de login
        exit; // Garante que o script pare de executar
    }
} else {
    // Se alguém tentar acessar este arquivo diretamente sem enviar o formulário
    header('Location: index.html'); // Redireciona para a página de login
    exit; // Garante que o script pare de executar
}
?>