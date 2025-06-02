<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$DB_HOST = "localhost";
$DB_NAME_ADMIN = "postgres"; // Nome do banco de dados padrão para conexão inicial
$DB_USER = "postgres";       // Usuário com permissão para criar bancos de dados
$DB_PASSWORD = "root";       // Senha do usuário

$new_db_name = "meu_novo_banco_de_dados";

$conn_string = "host=$DB_HOST dbname=$DB_NAME_ADMIN user=$DB_USER password=$DB_PASSWORD";

$conn = pg_connect($conn_string);

if(!$conn){

    die("Erro na conexão com o PostgreSQL: " . pg_last_error());
}

echo "Conexão estabelecida com sucesso ao banco padrão '$DB_NAME_ADMIN'.<br>";

$sql_create_db = "CREATE DATABASE \"$new_db_name\"";

$result = pg_query($conn, $sql_create_db);

if($result){
    echo "Banco de dados \"$new_db_name\" criado com sucesso!<br>";
}else{
    echo "Erro ao criar o banco de dados: " . pg_last_error($conn) . "<br>";
}


pg_close($conn);

echo "Conexão com o PostgreSQL fechada.";

?>
