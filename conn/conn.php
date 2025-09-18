<?php

$servername = "localhost";
$username = "root";
$password = "root";

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE myDB";
if($conn->query($sql) === TRUE){
    echo "Database created succesfully";
}else{
    echo "Error creating database: " . $conn->error;
}

$conn->close();

?>