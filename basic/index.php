<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>teste</title>
</head>
<body>

<div class="form">
    <form action="index.php" method="POST">
        <label for="user">User:</label>
        <input type="text" id="user" name="user">
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
        <br><br>
        <button type="submit">Cadastrar</button>
    </form>
</div>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['user']) && !empty($_POST['senha'])){

        $user = $_POST['user'];
        $senha = $_POST['senha'];

        echo "Seu user é " . htmlspecialchars($user) . "<br>";
        echo "Sua senha é ********";
    }else{
        echo "Por favor preencher os campos!";
    }
}

?>

</body>
</html>