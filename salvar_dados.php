<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$mensagem_status = "";
$nome_exibicao = "";
$idade_exibicao = "";
$sucesso_operacao = false;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = $_POST['nome'] ?? '';
    $data_nascimento = $_POST['idade'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $area = $_POST['area'] ?? '';


    
    if (empty($nome)) {
        $mensagem_status = "Ops! O campo 'Nome' não pode estar vazio. Por favor insira algo."; 
    } elseif (!filter_var($idade, FILTER_VALIDATE_INT) || $idade <= 0 || $idade > 150) {
        $mensagem_status = "Hmm, parece que a 'Idade' está inválida! Por favor, insira um número entre 1 e 150.";
    } else {
        
        $mensagem_status = "Cadastro realizado com sucesso! Seus dados foram processados.";
        $nome_exibicao = htmlspecialchars($nome); 
        $idade_exibicao = htmlspecialchars($idade); 
        $sucesso_operacao = true;
    }
} else { 
    $mensagem_status = "Acesso inválido! Por favor, use o formulário para enviar dados.";
}

include 'sucesso.html';

?>