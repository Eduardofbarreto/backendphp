<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Confirmação</title>
</head>
<body>
    
    <div class="mensagem-container">
        <h1><?php echo $mensagem_sucesso;?></h1>
        <p>Olá, <strong><?php echo $nome; ?></strong>. Obrigado por entrar em contato!</p>
        <a href="index.html" class="voltar-btn">Voltar</a>
    </div>

</body>
</html>