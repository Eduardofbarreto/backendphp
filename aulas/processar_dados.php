<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['num3'])){

        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];

        if($num1 > $num2 && $num1 > $num3){
            echo $num1 . " é o maior número de todos!";
        }elseif($num2 > $num1 && $num2 > $num3){
            echo $num2 . " é o maior número de todos!";
        }else{
            echo $num3 . " é o maior número de todos!";
        }
    }else{
        echo "Dados inválidos!";
    }
}

?>