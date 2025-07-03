<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '';
    

}

?>