<?php

// Configurações do banco de dados PostgreSQL
$db_host = 'edu_barreto'; // Substitua pelo IP/hostname do seu servidor PostgreSQL se for diferente
$db_name = 'postgres';
$db_user = 'postgres';    // Geralmente é 'postgres' ou o usuário que você criou
$db_pass = 'root';        // A senha que você mencionou

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o nome do campo 'nome' do formulário
    $nome = $_POST['nome'] ?? ''; // Usa o operador null coalescing para evitar Notice se 'nome' não existir

    // Validação básica: verifica se o nome não está vazio
    if (empty($nome)) {
        http_response_code(400); // Bad Request
        echo "O nome não pode ser vazio!";
        exit(); // Encerra o script
    }

    $conn = null; // Inicializa a conexão como nula
    try {
        // String de conexão para o PostgreSQL
        $conn_string = "host=$db_host dbname=$db_name user=$db_user password=$db_pass";
        
        // Tenta conectar ao banco de dados
        $conn = pg_connect($conn_string);

        if (!$conn) {
            throw new Exception("Erro ao conectar ao banco de dados PostgreSQL.");
        }

        // Prepara a consulta SQL para inserir o nome
        // Usamos pg_query_params para segurança (previne SQL Injection)
        $query = "INSERT INTO pessoas (nome) VALUES ($1)";
        $result = pg_query_params($conn, $query, array($nome));

        if (!$result) {
            throw new Exception("Erro ao inserir o nome no banco de dados: " . pg_last_error($conn));
        }

        // Redireciona para uma página de sucesso
        header('Location: sucesso.html'); // Você pode criar um sucesso.html ou exibir a mensagem aqui
        exit(); // Importante para garantir que o redirecionamento ocorra

    } catch (Exception $e) {
        // Em um ambiente de produção, logar o erro e mostrar uma mensagem genérica.
        // Para depuração, podemos imprimir o erro.
        http_response_code(500); // Internal Server Error
        echo "Erro ao salvar o nome no banco de dados. Por favor, tente novamente. Detalhes: " . $e->getMessage();
    } finally {
        // Fecha a conexão com o banco de dados se ela foi estabelecida
        if ($conn) {
            pg_close($conn);
        }
    }
} else {
    // Se a requisição não for POST (ex: alguém tentou acessar diretamente via URL)
    http_response_code(405); // Method Not Allowed
    echo "Método não permitido. Por favor, use o formulário.";
}

?>