<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_POST['name']) && isset($_POST['nota1']) && 
        isset($_POST['nota2']) && isset($_POST['nota3']) && isset($_POST['nota4']) ){

            $name = $_POST['name'];

            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];
            $nota4 = $_POST['nota4'];

            $media = ($nota1 + $nota2 + $nota3 + $nota4)/4;

            if ($media >=9){
                echo "Nota A";
                echo "<br>";
                echo $name . " sua média foi de " . $media;
            }elseif($media >=7){
                echo "Nota B";
                echo "<br>";
                echo $name . " sua nota foi de " . $media;
            }elseif($media >=5){
                echo "Nota C - Recuperação!";
                echo "<br>";
                echo $name . " sua nota foi de " . $media;
            }else{
                echo "Nota D - Reprovado";
                echo "<br>";
                echo $name . " sua nota foi de " . $media;
            }

        }else{
            echo "Dados inválidos!";
        }

    }

    echo "<br>";
    echo '<a href="index.html">Voltar</a>';

?>