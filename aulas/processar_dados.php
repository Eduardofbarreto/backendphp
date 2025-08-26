<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_POST['numero'])){

            $numero = intval($_POST['numero']);

            $tabuada = array(1,2,3,4,5,6,7,8,9,10);

            for($i = 0; $i <10; $i++){
                $resultado = $numero * $tabuada[$i] . "<br>";
                echo $numero . " x " . $tabuada[$i] . " = " . $resultado . "<br>";
            }


        }else{
            echo "Dados inválidos!";
        }

}
    

?>