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
    $feedbackMessage = 'Erro ao conectar ao banco de dados. Verifique a conexão do servidor PostgreSQL.'; // Mensagem mais amigável
    error_log("PostgreSQL Connection Failed: " . pg_last_error());
} else {
    // Query para selecionar todos os dados da tabela 'cadastro'
    $query = "SELECT * FROM cadastro ORDER BY nome ASC"; // Ordena por nome
    $result = pg_query($conn, $query);

    if (!$result) {
        $feedbackStatus = 'error';
        $feedbackMessage = 'Erro ao consultar dados: ' . pg_last_error($conn);
        error_log("Database Query Error: " . $feedbackMessage);
    }
}
// Fechar a conexão com o banco de dados (se a conexão foi bem-sucedida)
if ($conn) {
    pg_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Consultar Cadastros</title>
    </head>
<body>
    <h1>Consultar Cadastros:</h1>

    <div class="container">
        <?php if (!empty($feedbackMessage)): ?>
            <div class="message <?php echo $feedbackStatus; ?>">
                <?php echo htmlspecialchars($feedbackMessage); ?>
            </div>
        <?php endif; ?>

        <?php 
        // Verifica se $result existe e se a query foi bem-sucedida
        if (isset($result) && $result !== false && pg_num_rows($result) > 0): ?>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data Nasc.</th>
                            <th>CEP</th>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Complemento</th>
                            <th>Data Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = pg_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['nome'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['data_nascimento'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['cep'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['rua'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['numero'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['bairro'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['cidade'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['estado'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['complemento_endereco'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['data_cadastro'] ?? ''); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php elseif (isset($result) && $result !== false): // Se a consulta rodou mas não retornou linhas ?>
            <p class="no-records">Nenhum cadastro encontrado.</p>
        <?php endif; ?>

        <p><a href="index.html">Voltar para o Início</a></p>
    </div>
</body>
</html>