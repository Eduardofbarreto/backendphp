<?php

session_start();

if(!isset($_SESSION['numero_secreto'])){
    $_SESSION['numero_secreto'] = 10;
}

if(isset($_POST['palpite'])){
    $palpite = $_POST['palpite'];

    $numero_secreto = $_SESSION['numero_secreto'];

    echo "<h1>Resultado do seu palpite!</h1>";

    if($palpite < $numero_secreto){
        echo "<p>Seu palpite é muito baixo! Tente um número maior!</p>";
    }elseif($palpite > $numero_secreto){
        echo "<p>Seu palpite é muito alto! Tente um número menor!</p>";
    }else{
        echo "<h2>Parabéns!! Você acertou o número $numero_secreto!</h2>";
        echo "<p>Vamos começar um novo jogo!</p>";

        session_destroy();
    }

    echo "<a href='index.html'>Tentar novamente!</a>";
}else{
    echo "<h1>Bem-vindo ao jogo de adivinhação!</h1>";
    echo "<p>Digite seu palpite e clique em adivinhar!</p>";
    echo "<a href='index.html'>Voltar ao jogo!</a>";
}