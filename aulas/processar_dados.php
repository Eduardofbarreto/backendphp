<?php


session_start();

if(!isset($_SESSION['numero_secreto'])){
    $_SESSION['numero_secreto'] = rand(1, 100);
}

if(isset($_POST['palpite'])){
    $palpite = $_POST['palpite'];

    $numeroSecreto = $_SESSION['numero_secreto'];

    echo "<h1>Resultado do seu Palpite</h1>";

    if($palpite < $numeroSecreto){
        echo "<p>Seu palpite é muito baixo! Tente um número maior!</p>";
    }elseif($palpite > $numeroSecreto){
        echo "<p>Seu palpite é muito alto! Tente um número menor!</p>";
    }else{
        echo "<h2>Parabéns! Você acertou o número $numeroSecreto!</h2>";
        echo "<p>Vamos começar um novo jogo.</p>";

        session_destroy();
    }

    echo "<a href='index.html'>Tentar novamente</a>";
}else{
    echo "<h1>Bem-vindo ao jogo de adivinhação!</h1>";
    echo "<p>Digite seu palpite e clique em adivinhar!</p>";
    echo "<a href='index.html'>Voltar ao jogo</a>";
}


?>