<?php
require_once 'conexao.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $data_nascimento_str = htmlspecialchars(trim($_POST['data_nascimento']));
    $cpf = htmlspecialchars(trim($_POST['cpf']));
    $telefone = htmlspecialchars(trim($_POST['telefone']));

    $data_nascimento = null;
    if(!empty($data_nascimento_str)){
        $data_obj = DateTime::createFromFormat('d-m-Y', $data_nascimento_str);
        if($data_obj){
            $data_nascimento = $data_obj->format('Y-m-d');
        }else{
            echo "Erro: Formato de data inválido. Use DD-MM-AAAA.<br>";
        }
    }
}


?>