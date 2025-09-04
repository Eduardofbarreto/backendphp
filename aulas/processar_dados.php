<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['num1']) && isset($_POST['num2'])){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        $op = $_POST['op'];

        switch($op){
            case '+':
                $soma = $num1 + $num2;
                echo "O resultado da soma é " . $soma . ".";
            break;
            case '-' :
                $subt = $num1 - $num2;
                echo "O resultado da subtração é " . $subt . ".";
            break;
            case '*':
                $mult = $num1 * $num2;
                echo "O resultado da multiplicação é " . $mult . ".";
            break;
            case '/':
                if($num2 == 0){
                    echo "Erro ao tentar dividir por 0!";
                }else{
                    $div = $num1 / $num2;
                echo "O resultado da divisão é " . $div . ".";
                }
            break;
            default:
                echo "Algo está errado!";
        }
    }else{
        echo "Preencha os campos!";
    }
}

?>