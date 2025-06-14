<?php
session_start(); // Inicia a sessão

// Limpa todas as variáveis de sessão.
$_SESSION = array();

// Se o cookie de sessão for usado, ele também será excluído.
// Isso garante que o usuário seja completamente deslogado.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destrói a sessão.
session_destroy();

header('Location: index.html'); // Redireciona o usuário para a página de login
exit; // Garante que o script pare de executar
?>