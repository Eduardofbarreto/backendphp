<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['cor'])){

            $cor = $_POST['cor'];

            switch($cor){
                case "azul":
                echo "Você escolheu a cor " . $cor;
            break;
                case "vermelho":
                echo "Você escolheu a cor " . $cor;
            break;
                default:
                echo "Nenhuma cor válida!";
            }
        }else{
            echo "Informações incorretas!";
        }
    }

?>