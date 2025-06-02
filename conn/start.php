<?php

$host = "127.0.0.1";
$port = "5432";
$user = "postgres";
$password = "root";
$dbname = "meu_novo_banco_de_dados";

$connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reg_date = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(empty($nome)|| empty($sobrenome)|| empty($email) || empty($reg_date)){
        die("Erro: Todos os campos são obrigatórios. Por favor, volte e preencha o formulário.");
    }

    
    echo "Valor de \$reg_date recebido do formulário: **" . $reg_date . "**<br>";
    

    $date_object = DateTime::createFromFormat('d/m/Y', $reg_date); 

    if($date_object === false){
        die("Erro: Formato de data inválido para o campo 'data'. Verifique se está como DD-MM-AAAA (ex: 15-04-1989).");
    } //troquei valor da data para dd-mm-aaaa

    $data_para_bd = $date_object->format('Y-m-d');

    echo "Tentando conectar ao banco de dados '$dbname' para inserir dados...<br>";

    $conn = @pg_connect($connection_string);

    if(!$conn){
        die("Erro na conexão ao banco de dados '$dbname'. Verifique as configurações e se o banco existe: " . error_get_last()['message']);
    }

    echo "Conexão ao banco de dados '$dbname' estabelecida com sucesso para inserção!<br>";

    $sql_insert = "INSERT INTO myguests (nome, sobrenome, email, reg_date) VALUES ($1, $2, $3, $4)";

    echo "Tentando inserir o registro: {$nome} {$sobrenome} ({$email}) {$data_para_bd}...<br>";

    $prepare_result = pg_prepare($conn, "insert_guest_stmt", $sql_insert);

    if(!$prepare_result){
        echo "Erro ao preparar a declaração SQL. Verifique se a tabela 'MyGuests' existe e suas colunas (especialmente 'reg_date'): " . pg_last_error($conn) . "<br>";
        pg_close($conn);
        die();
    }

    $execute_result = pg_execute($conn, "insert_guest_stmt", array($nome, $sobrenome, $email, $data_para_bd));

    if($execute_result){
        if(pg_affected_rows($execute_result) > 0){
            echo "Novo registro criado com sucesso!<br>";
        }else{
            echo "Nenhum registro foi inserido. Algo pode ter dado errado.<br>";
        }
    }else{
        echo "Erro ao inserir registro: " . pg_last_error($conn) . "<br>";
    }

    pg_close($conn);
    echo "Conexão fechada.<br>";

}else{
    echo "Este script deve ser acessado via um formulário POST. <a href='index.html'>Voltar ao formulário</a>.";
}