<?php


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


?>