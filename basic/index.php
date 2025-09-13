<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>teste</title>
</head>
<body>

<div class="form">
    <form action="index.php" method="GET">
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

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['user']) && isset($_GET['senha'])){

        $user = $_GET['user'];
        $senha = $_GET['senha'];

        echo "Seu usuário é : " . "<br>";
        echo $user . "<br>";
        echo "Sua senha é: " . "<br>";
        echo $senha;
    }else{
        echo "Informações não preenchidas!";
    }
}

?>

</body>
</html>