<?php

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

?>