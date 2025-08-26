<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['cor'])){

            $cor = $_POST['cor'];

            switch($cor){
                case "vermelho":
                case "azul":
                case "verde":
                echo "Você escolheu a cor " . $cor;
            break;
            default:
                echo "Nenhuma cor válida!";
            }
        }else{
            echo "Você não inseriu as informações!";
        }
    }

?>