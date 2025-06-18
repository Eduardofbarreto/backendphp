<?php

if($_SERVER["RESQUEST_METHOD"] == "POST"){
    $nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : 'Não informado';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'Não informado';
    $assunto = isset($_POST['assunto']) ? htmlspecialchars($_POST['assunto']) : 'Não informado';
    $mensagem = isset($_POST['mensagem']) ? htmlspecialchars($_POST['mensagem']) : 'Não informado';

    echo "<h1>Dados recebidos com sucesso!</h1>";
    echo "<p><strong>$nome</strong>! Sua mensagem foi enviada.</p>";
    echo "<p>Não estamos salvando em um banco de dados neste exemplo!</p>";
    echo "<p>Confira os dados que você enviou: </p>";
    echo "<div class='data-item'><strong>Nome: </strong> $nome</div>";
    echo "<div class='data-item><strong>E-mail: </strong> $email </div>";
    echo "<div class='data-item><strong>Assunto: </strong> $assunto</div>";
    echo "<div class='data-item><strong>Mensagem: </strong> $mensagem</div>";
} else {
    echo "<h1>Acesso inválido!</h1>";
    echo "<p>Este arquivo deve ser acessado via envio de formulário.</p>";
}

?>