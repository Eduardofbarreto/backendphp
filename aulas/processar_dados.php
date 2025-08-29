<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['nome']) && isset($_POST['idade'])){

            $nome = $_POST['nome'];
            $idade = $_POST['idade'];

            echo "Dados salvos com sucesso!";

        }else{
            echo "Dados inválidos!";
        }
    }

?>