<?php

$host = "localhost";
$port = "5432";
$dbname = "meu_novo_banco_de_dados";
$user = "postgres";
$password = "root";

$conn_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";

$conn = pg_connect($conn_string);

if(!$conn){
    die("Connection failed: " . preg_last_error());
}

$new_database_name = "meu_novo_banco_de_dados";

$check_db_sql = "SELECT 1 FROM pg_database WHERE datname = '" . pg_escape_literal($new_database_name) . "'";
$check_db_sql = pg_query($conn, $check_db_sql);

if($check_db_sql && pg_num_rows($check_db_result)>0){
    echo "Database '{new_database_name}' alread exists. <br>";
}else{
    $create_db_sql = "CREATE DATABASE " . pg_escape_identifier($new_database_name);

    $create_db_result = pg_query($conn, $create_db_sql);

    if($create_db_result){
        echo "Database '{$new_database_name}' created successfully. <br>";
    }else{
        echo "Error creating database: " . preg_last_error($conn) . "<br>";
    }
}

pg_close($conn);


?>