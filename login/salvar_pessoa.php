<?php

if($_SERVER["RESQUEST_METHOD"] == "POST"){
    $nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : 'Não informado';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'Não informado';
    $dataNascimento = isset($_POST['dataNascimento']) ? htmlspecialchars($_POST['dataNascimento']) : 'Não informado';
    $cpf = isset($_POST['cpf']) ? htmlspecialchars($_POST['cpf']) : 'Não informado';
    $telefone = isset($_POST['telefone']) ? htmlspecialchars($_POST['telefone']) : 'Não informado';

    echo "<h1>Dados recebidos com sucesso!</h1>";
    echo "<p>Olá, <strong>$nome</strong>! Sey cadastro foi rececido.</p>";

    echo "<div class='data-item'><strong>Nome: </strong> $nome </div>";
    echo "<div class'data-item'><strong>E-mail: </strong> $email </div>";
    echo "<div class='data-item'><strong>Data de Nascimento: </strong> $dataNascimento </div>";
    echo "<div class='data-item'><strong>CPF:</strong> $cpf </div>";
    echo "<div class='data-item'><strong>Telefone: </strong> $telefone </div>";

    echo "<p><em>Estes dados são apenas exibidos!</em></p>";
    echo '<a href="index.html" class="back-button">Voltar ao formulário</a>';
} else {
    echo "<h1>Acesso inválido!</h1>";
    echo "<p>Este arquivo deve ser acessado via envio de formulário.</p>";
    echo '<a href="index.html" class="back-button">Voltar ao formulário.</a>';
}

?>