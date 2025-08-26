<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_POST['idade'])){

            $idade = intval($_POST['idade']);

            if($idade < 0){
                echo "Idade inválida!!";
            }elseif($idade <=8){
                echo "Você tem " . $idade . " anos e é uma CRIANÇA!";
            }elseif($idade <= 12){
                echo "Você tem " . $idade . " anos e é um pré-adolescente!";
            }elseif($idade <=18){
                echo "Você tem " . $idade . " anos e é um adolescente!";
            }elseif($idade <=60){
                echo "Você tem " . $idade . " anos e é um adulto!";
            }else{
                echo "Você tem " . $idade . " anos e é um sênior!";
            }
        }else{
            echo "Dados inválidos!";
        }

    }

?>