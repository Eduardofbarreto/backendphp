<?php

$host = 'localhost';
$dbname = 'meu_novo_banco_de_dados';
$user = 'postgres';
$password = 'root';

try{
    $dsn = "psql:host=$host;dbname=$dbname";

    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
}catch(PDOException $e){
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}