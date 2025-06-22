<?php

if(isset($_GET['nome']) && !empty($_GET['nome'])){
    $nome = htmlspecialchars($_GET['nome']);
    $email = htmlspecialchars($_GET['email']);
    $cpf = htmlspecialchars($_GET['cpf']);
    echo "<h2>Seja bem-vindo, " . $nome . "!</h2>";
    echo "<p>Esperamos que você tenha um ótimo dia!</p>";
}else{
    echo "<h2>Olá!</h2>";
    echo "<p>Por favor, nos diga seu nome!</p>";

    header('Location: index.html');
    exit();
}


?>