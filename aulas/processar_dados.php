<?php

<<<<<<< HEAD

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['modelo']) && isset($_POST['ano']) && isset($_POST['cor'])){

        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        $cor = $_POST['cor'];

        <doctype html>
        <head></head>
        echo "Veículo cadastrado com sucesso!<br>";
        echo $modelo . " do ano " . $ano . " na cor " . $cor . ".";
    }else{
        echo "Dados inválidos!";

    }
}

=======
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['numero'])){

        $numero = $_POST['numero'] - 1;

        $diasDaSemana = [
            'Segunda-feira',
            'Terça-feira',
            'Quarta-feira',
            'Quinta-feira',
            'Sexta-feira',
            'Sábado',
            'Domingo'
        ];

        echo "Você escolheu " . $diasDaSemana[$numero] . ".";
    }else{
        echo "Opção inválida!";
    }
}
>>>>>>> 847caa0 (brincando com array)

?>