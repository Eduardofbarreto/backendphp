<?php

// Habilitar exibição de erros (APENAS PARA DESENVOLVIMENTO!)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Detalhes da conexão com o banco de dados
$host = "localhost";
$port = "5432";
$dbname = "meu_novo_banco_de_dados"; // Seu nome de banco de dados existente
$user = "postgres";
$password = "root";

// Estabelecer conexão com o banco de dados
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    error_log("PostgreSQL Connection Failed: " . pg_last_error());
    // Se a conexão falhar, redireciona de volta para o formulário com uma mensagem de erro
    header('Location: index.html?status=error&message=' . urlencode('Não foi possível conectar ao banco de dados. Tente novamente mais tarde.'));
    exit; // Importante para parar a execução do script após o redirecionamento
}

// Processar submissão do formulário se for um POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter e sanitizar todos os dados POST de entrada
    $nome = pg_escape_string($conn, $_POST['nome'] ?? '');
    $data_nascimento_input = $_POST['dataNascimento'] ?? '';
    $cep = pg_escape_string($conn, $_POST['cep'] ?? '');
    $rua = pg_escape_string($conn, $_POST['rua'] ?? '');
    $numero = pg_escape_string($conn, $_POST['numero'] ?? '');
    $bairro = pg_escape_string($conn, $_POST['bairro'] ?? '');
    $cidade = pg_escape_string($conn, $_POST['cidade'] ?? '');
    $estado = pg_escape_string($conn, $_POST['estado'] ?? '');
    $complemento_endereco = pg_escape_string($conn, $_POST['complemento_endereco'] ?? '');

    // Lidar com a formatação da data de nascimento
    $data_nascimento_db = null;
    if (!empty($data_nascimento_input)) {
        // Altere 'd-m-Y' para 'd/m/Y' se o JavaScript estiver formatando com barras
        $data_nascimento_formatada = DateTime::createFromFormat('d/m/Y', $data_nascimento_input);
        if ($data_nascimento_formatada) {
            $data_nascimento_db = $data_nascimento_formatada->format('Y-m-d');
        } else {
            // Logar erro se o formato da data estiver incorreto
            error_log("Formato de data de nascimento inválido: " . $data_nascimento_input);
        }
    }

    // Preparar a query INSERT para a tabela 'cadastro'
    $query = "INSERT INTO cadastro (nome, data_nascimento, cep, rua, numero, bairro, cidade, estado, complemento_endereco)
              VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9)";

    // Executar a query com parâmetros
    $result = pg_query_params($conn, $query, array(
        $nome,
        $data_nascimento_db,
        $cep,
        $rua,
        $numero,
        $bairro,
        $cidade,
        $estado,
        $complemento_endereco
    ));

    // Verificar se a inserção foi bem-sucedida e fornecer feedback
    if ($result) {
        // Redireciona de volta para o formulário com uma mensagem de sucesso
        header('Location: index.html?status=success&message=' . urlencode('Dados inseridos com sucesso!'));
        exit;
    } else {
        // Redireciona de volta para o formulário com uma mensagem de erro
        $errorMessage = 'Erro ao inserir dados: ' . pg_last_error($conn);
        error_log("Database Insert Error: " . $errorMessage);
        header('Location: index.html?status=error&message=' . urlencode($errorMessage));
        exit;
    }
}

// Fechar a conexão com o banco de dados
pg_close($conn);

?>