<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(isset($_POST['valor_da_compra']) && isset($_POST['desconto'])){

            $valor_da_compra = intval($_POST['valor_da_compra']);
            $desconto = intval($_POST['desconto']);

            $desconto_calculado = $desconto / 100;

            $valor_final = ($valor_da_compra) - ($valor_da_compra*$desconto_calculado);

            echo "Seu valor total de " . $valor_da_compra . " passou para apenas: " . $valor_final;
            echo "<br><br>";
            echo '<a href="index.html">Voltar</a>';
        }else{
            echo "Por favor preencha todos os campos!";
        }
    }

?>