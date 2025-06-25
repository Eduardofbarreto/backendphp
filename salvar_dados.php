<?php

if($_SERVER["RESQUES_METHOD"] == "POST"){
    $nome = htmlspecialchars(trim($_POST['nome'] ?? ''));
    $endereco = htmlspecialchars(trim($_POST['endereco'] ?? ''));
    $data_nascimento = htmlspecialchars(trim($_POST['data_nascimento']?? ''));
    $cpf = htmlspecialchars(trim($_POST['cpf']?? ''));

    if(empty($nome)|| empty($endereco)|| empty($data_nascimento)||
        empty($cpf));
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
        <title>Erro no cadastro</title>
        <body>
            <div class="container">
                <h1>Erro no cadastro!</h1>
                <p>Por favor, preencha todos os campos do formulário.</p>
                <a href="index.html" class="black-link">Voltar</a>
            </div>
        </body>
    </head>
</html>