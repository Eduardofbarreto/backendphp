<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = htmlspecialchars($_POST['nome']) ;
    $data_nascimento = htmlspecialchars($_POST['data_nascimento']);
    $endereco = htmlspecialchars($_POST['endereco']);
    $sexo = htmlspecialchars($_POST['sexo']);
    $area = htmlspecialchars($_POST['area']);

    if(empty($nome) || empty($data_nascimento) || empty($email) || 
        empty($sexo) || empty($area)){
            header("Location:index.html?status=error");
            exit();
        }

    
}

?>