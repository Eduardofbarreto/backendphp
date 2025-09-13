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

$nome = "Eduardo F. Barreto";
$mensagem = "Seja bem-vindo(a) " . $nome . "!<br>";
$date = date("d/m/Y");

?>

<div class="conteudo">
    <p>
        <?php echo $mensagem ?>
    </p>
    <p>
        <?php echo $date ?>
    </p>
</div>

</body>
</html>