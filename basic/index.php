<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>teste</title>
</head>
<body>

<?php

$ano_atual = 2025;
$ano_nascimento = 1987;
$idade = $ano_atual - $ano_nascimento;
$nome = "Eduardo";
$sobrenome = "Barreto";

?>

<div class="respostas">
    <p class="item1">
        Nome: <?php echo $nome . " " . $sobrenome ?><br>
    </p>
    <p class="item2">
        Idade: <?php echo $idade . " anos" ?>
    </p>
</div>

</body>
</html>