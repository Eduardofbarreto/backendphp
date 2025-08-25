<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_POST['idade'])){

            $idade = intval($_POST['idade']);

            if($idade >=18){
                echo "Você tem " . $idade . " anos e é maior de idade";
            }else{
                echo "Você tem " . $idade . " anos e é menor de idade";
            }
        }else{
            echo "Dados inválidos!";
        }

    }

?>