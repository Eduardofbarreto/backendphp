<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['numero3']) && isset($_POST['numero4'])){
            $num3 = intval($_POST['numero3']);
            $num4 = intval($_POST['numero4']);

            $resultado1 = ($num4 / 100) * $num3;
            echo $num4 . "%" . " de " . $num3 . " é igual a: " . $resultado1;
            echo "<br><br>";

            echo '<a href="index.html">Voltar para a calculadora!</a>';
            
        }else{
            echo "Por favor preencha os campos!";
        }
            
    }

?>