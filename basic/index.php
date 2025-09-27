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
                <label for="nome">Nome paciente:</label><br>
                <input type="text" id="nome" name="nome">
            </div>
            <br>
            <div class="caixa">
                <label for="data_de_nascimento">Data de nascimento:</label><br>
                <input type="date" id="data_de_nascimento" name="data_de_nascimento">
            </div>
            <br>
            <div class="caixa">
                <label for="cpf">Cpf:</label><br>
                <input type="text" id="cpf" name="cpf">
            </div>
            <div class="caixa">
                <label for="pressao">Pressão arterial:</label><br>
                <input type="number" id="pressao" name="pressao">
            </div>
            <br>
            <div class="batimentos">
                <label for="batimentos">Batimentos:</label><br>
                <input type="number" id="batimentos" name="batimentos">
            </div>
            <br>
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