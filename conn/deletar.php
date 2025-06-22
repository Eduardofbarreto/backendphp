<?php
include 'conexao.php'; // Inclui o arquivo de conexão

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    try {
        // Prepara a consulta SQL para deletar o usuário
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);

        // Redireciona de volta para a página de consulta com uma mensagem de sucesso
        header("Location: consultar.php?status=sucesso&mensagem=" . urlencode("Usuário deletado com sucesso!"));
        exit();
    } catch (PDOException $e) {
        // Redireciona com mensagem de erro
        header("Location: consultar.php?status=erro&mensagem=" . urlencode("Erro ao deletar usuário: " . $e->getMessage()));
        exit();
    }
} else {
    // Se o ID não foi fornecido, redireciona para a página de consulta
    header("Location: consultar.php?status=erro&mensagem=" . urlencode("ID do usuário não fornecido para exclusão."));
    exit();
}
?>