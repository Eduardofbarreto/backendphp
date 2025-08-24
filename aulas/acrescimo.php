<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_POST['valor_da_compra1']) && isset($_POST['acrescimo'])){

            $valor_da_compra1 = intval($_POST['valor_da_compra1']);
            $acrescimo = intval($_POST['acrescimo']);


            $acrescimo_final = $acrescimo / 100;

            $valor_final1 = $valor_da_compra1 + ($valor_da_compra1*$acrescimo_final);

            echo "O valor da sua compra é de: " . $valor_final1;
            echo "<br><br>";
            echo '<a href="index.html">Voltar</a>';
        }else{
            echo "Por favor, preencha os dados do formulário!";
        }
    }

?>