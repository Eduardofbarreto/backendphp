<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['num'])){

            $num = intval($_POST['num']);

            if($num % 2 == 0){
                echo $num . " é par!";
            }else{
                echo $num . " é ímpar!";
            }
        }else{
            echo "Nenhum opção válida!";
        }
    }

?>