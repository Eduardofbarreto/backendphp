<?php

$host = "edu_barreto";
$port = "5432";
$dbname = "meu_novo_banco_de_dados";
$user = "postgres";
$password = "root";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if(!$conn){
    die("Connection failed: " . preg_last_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = pg_escape_string($conn, $_POST['nome']);
    $endereco = pg_escape_string($conn, $_POST['endereco']);
    $data_nascimento = pg_escape_string($conn, $_POST['dataNascimento']);
}

?>