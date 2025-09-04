<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['num'])){

        $num = $_POST['num'];

        $tab = [1,2,3,4,5,6,7,8,9,10];

        for($i = 0; $i < 10; $i++){
            $resultado = $num * $tab[$i];
            echo "O resultado de " . $num . " x " . $tab[$i] . " = " . $resultado . "<br>";
        }
    }

    echo "<a href='index.html'>Voltar</a>";
}


?>