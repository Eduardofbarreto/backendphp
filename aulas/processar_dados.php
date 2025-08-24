<?php

    // Verifica se o formulário foi enviado pelo método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Verifica se todas as variáveis necessárias foram recebidas do formulário
        if (isset($_POST['numero1']) && isset($_POST['numero2']) && isset($_POST['operacao'])) {
            
            // Atribui os valores do formulário a variáveis PHP
            $num1 = intval($_POST['numero1']);
            $num2 = intval($_POST['numero2']);
            $operacao = $_POST['operacao'];

            $resultado = 0; // Inicializa a variável resultado

            // Usa uma estrutura condicional para realizar a operação correta
            if ($operacao == 'soma') {
                $resultado = $num1 + $num2;
                echo "O resultado da soma é: " . $resultado . "<br>";
                // <a href="index.html">Voltar</a>
            } elseif ($operacao == 'subt') {
                $resultado = $num1 - $num2;
                echo "O resultado da subtração é: " . $resultado;
            }elseif($operacao == 'mult'){
                $resultado = $num1 * $num2;
                echo "O resultado da multiplicação é: " . $resultado;
            }elseif($operacao == 'div'){
                $resultado = $num1 / $num2;
                echo "O resultado da divisão é: " . $resultado;
            }else {
                echo "Operação inválida.";
            }

            echo "<br><br>";
            echo '<a href="index.html">Voltar para a calculadora!</a>';

        } else {
            // Mensagem de erro caso algum campo não seja preenchido
            echo "Por favor, preencha todos os campos do formulário.";
        }
    }

?>