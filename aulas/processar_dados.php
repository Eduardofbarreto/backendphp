<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];

        $num1 = intval($numero1);
        $num2 = intval($numero2);

        $resultado = $num1 + $num2;

        echo "O resultado da soma é: " . $resultado;
    }
?>