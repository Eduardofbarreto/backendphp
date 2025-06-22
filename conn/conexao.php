<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'meu_novo_banco_de_dados';
$user = 'postgres';
$password = 'root'; // ATENÇÃO: Em produção, use senhas fortes e usuários dedicados!

try {
    // Cria uma nova conexão PDO (PHP Data Objects)
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

    // Define o modo de erro do PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conexão com o banco de dados realizada com sucesso!"; // Apenas para teste
} catch (PDOException $e) {
    // Em caso de erro na conexão, exibe a mensagem de erro
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>