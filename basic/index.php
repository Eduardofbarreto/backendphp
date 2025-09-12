<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
</head>
<body>

<?php

$idade = 38;
$idade_daqui_cinco_anos = $idade + 5;
$ano_nascimento = 1987;
$decadas = $idade/10;

?>


<p>

Idade atual: <?php echo $idade; ?><br>
Idade em cinco anos: <?php echo $idade_daqui_cinco_anos; ?><br>
Ano de nascimento: <?php echo $ano_nascimento; ?><br>

</p>

</body>
</html>