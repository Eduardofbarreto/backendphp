<?php
// Habilitar exibição de erros (APENAS PARA DESENVOLVIMENTO!)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Detalhes da conexão com o banco de dados
$host = "localhost"; // Certifique-se de que é "localhost"
$port = "5432";
$dbname = "meu_novo_banco_de_dados";
$user = "postgres";
$password = "root";

$feedbackMessage = '';
$feedbackStatus = '';

// Estabelecer conexão
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Verificar conexão
if (!$conn) {
    $feedbackStatus = 'error';
    $feedbackMessage = 'Erro ao conectar ao banco de dados: ' . pg_last_error();
    error_log("PostgreSQL Connection Failed: " . $feedbackMessage);
} else {
    // Processar a exclusão se o formulário for submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_para_deletar'])) {
        $id_para_deletar = filter_var($_POST['id_para_deletar'], FILTER_SANITIZE_NUMBER_INT); // Sanitiza o ID

        if (!empty($id_para_deletar) && is_numeric($id_para_deletar)) {
            $query_delete = "DELETE FROM cadastro WHERE id = $1";
            $result_delete = pg_query_params($conn, $query_delete, array($id_para_deletar));

            if ($result_delete) {
                // Verifica se alguma linha foi realmente afetada (deletada)
                if (pg_affected_rows($result_delete) > 0) {
                    $feedbackStatus = 'success';
                    $feedbackMessage = "Cadastro com ID {$id_para_deletar} deletado com sucesso!";
                } else {
                    $feedbackStatus = 'info'; // Use 'info' para indicar que nada foi deletado
                    $feedbackMessage = "Nenhum cadastro encontrado com o ID {$id_para_deletar}.";
                }
            } else {
                $feedbackStatus = 'error';
                $feedbackMessage = 'Erro ao deletar cadastro: ' . pg_last_error($conn);
                error_log("Database Delete Error: " . $feedbackMessage);
            }
        } else {
            $feedbackStatus = 'error';
            $feedbackMessage = 'ID inválido fornecido.';
        }
    }
}
// Fechar a conexão
pg_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Deletar Cadastro</title>
</head>
<body>
    <h1>Deletar Cadastro:</h1>

    <div class="container">
        <?php if (!empty($feedbackMessage)): ?>
            <div class="message <?php echo $feedbackStatus; ?>">
                <?php echo $feedbackMessage; ?>
            </div>
        <?php endif; ?>

        <p>Digite o ID do cadastro que deseja deletar:</p>
        <form action="deletar_cadastro.php" method="post">
            <div class="form-group">
                <label for="id_para_deletar">ID do Cadastro:</label>
                <input type="number" id="id_para_deletar" name="id_para_deletar" required min="1">
            </div>
            <button type="submit">Deletar Cadastro</button>
        </form>

        <p><a href="index.html">Voltar para o Início</a></p>
        <p><a href="consultar_cadastro.php">Consultar Cadastros (para ver os IDs)</a></p>
    </div>
</body>
</html>