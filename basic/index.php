<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>teste</title>
</head>
<body>

    <div class="conteudo">
        <form action="index.php" method="post">
            <div class="caixa">
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome">
                <br><br>
            </div>
            <div class="caixa">
                <label for="sobrenome">Sobrenome:</label><br>
                <input type="text" id="sobrenome" name="sobrenome">
                <br><br>
            </div>
            <div class="caixa">
                <label for="data_nascimento">Data de Nascimento:</label><br>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
                <br><br>
            </div>
            <div class="botao">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['data_nascimento'])){

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $data_nascimento = $_POST['data_nascimento'];

        echo "Seu nome é " . $nome . " " . $sobrenome . "!<br>";
        echo "Você nasceu dia " . $data_nascimento . "!<br>";
    }else{
        echo "Você precisa responder o formulário!";
    }
}

?>

</body>
</html>