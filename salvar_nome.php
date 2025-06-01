<?php
// Mantenha as configurações de exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configurações do banco de dados PostgreSQL
$db_host = 'localhost'; // Ajuste para 'edu_barreto' se for o seu nome de host real e estiver funcionando
$db_name = 'postgres';
$db_user = 'postgres';
$db_pass = 'root';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $idade = $_POST['idade'] ?? '';
    $cidade = $_POST['cidade'] ?? '';

    if (empty($nome)) {
        http_response_code(400); // Bad Request
        echo "O nome não pode ser vazio!";
        exit();
    }

    if (empty($idade)){
        http_response_code(response_code:400);
        echo "Idade não pode ser vazia!";
        exit();
    }

    if(empty($cidade)){
        http_response_code(response_code:400);
        echo "A cidade não pode ser vazia!";
        exit();
    }

    $conn = null;
    try {
        $conn_string = "host=$db_host dbname=$db_name user=$db_user password=$db_pass";
        $conn = pg_connect($conn_string);

        if (!$conn) {
            throw new Exception("Erro ao conectar ao banco de dados PostgreSQL.");
        }

        // AQUI ESTÁ A QUERY: INSERINDO APENAS NOME, COM UM PARÂMETRO
        $query = "INSERT INTO pessoas (nome, idade, cidade) VALUES ($1, $2, $3)";
        $result = pg_query_params($conn, $query, array($nome, $idade, $cidade)); // Passando apenas o $nome

        if (!$result) {
            throw new Exception("Erro ao inserir o nome no banco de dados: " . pg_last_error($conn));
        }

        header('Location: sucesso.html');
        exit();

    } catch (Exception $e) {
        http_response_code(500); // Internal Server Error
        echo "Erro ao salvar o nome no banco de dados. Por favor, tente novamente. Detalhes: " . $e->getMessage();
    } finally {
        if ($conn) {
            pg_close($conn);
        }
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "Método não permitido. Por favor, use o formulário.";
}

?>