<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inserir Novo Cadastro</title>
</head>
<body>
    <h1>Inserir Novo Cadastro:</h1>

    <div class="container">
        <form action="processar_formulario.php" method="post">
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome: " required>
            </div>
            <div class="form-group">
                <label for="dataNascimento">Data de Nascimento: </label>
                <input type="text" id="dataNascimento" name="dataNascimento" placeholder="DD/MM/AAAA"> </div>
            <div class="form-group">
                <label for="cep">CEP: </label>
                <input type="text" id="cep" name="cep" placeholder="Digite seu CEP: " maxlength="9" required>
            </div>
            <div class="form-group">
                <label for="rua">Rua: </label>
                <input type="text" name="rua" id="rua" placeholder="Rua: " readonly>
            </div>
            <div class="form-group">
                <label for="numero">Número: </label>
                <input type="text" name="numero" id="numero" placeholder="Número">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro: </label>
                <input type="text" name="bairro" id="bairro" placeholder="Bairro: " readonly>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade: </label>
                <input type="text" id="cidade" name="cidade" placeholder="Cidade: " readonly>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" placeholder="Estado: " maxlength="2" readonly>
            </div>
            <div class="form-group">
                <label for="complemento_endereco">Complemento: </label>
                <input type="text" id="complemento_endereco" name="complemento_endereco" placeholder="Apto, Bloco, etc.">
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <p><a href="index.html">Voltar para o Início</a></p> </div>

    <script src="script.js"></script>
    <script>
        // Este script é necessário APENAS na página com o formulário
        // Ele vai gerenciar a exibição das mensagens após o redirecionamento
        // do processar_formulario.php.
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            const message = urlParams.get('message');
            
            // Cria um div para a mensagem se ele ainda não existir
            let messageDiv = document.getElementById('form-feedback-message');
            if (!messageDiv) {
                messageDiv = document.createElement('div');
                messageDiv.id = 'form-feedback-message';
                const form = document.querySelector('.container form');
                if (form) {
                    form.insertBefore(messageDiv, form.firstChild); // Insere antes do formulário
                } else {
                    document.querySelector('.container').appendChild(messageDiv);
                }
            }


            if (status && message) {
                messageDiv.textContent = decodeURIComponent(message);
                messageDiv.style.padding = '10px';
                messageDiv.style.borderRadius = '5px';
                messageDiv.style.textAlign = 'center';
                messageDiv.style.marginBottom = '20px'; // Espaço abaixo da mensagem

                if (status === 'success') {
                    messageDiv.style.backgroundColor = '#d4edda';
                    messageDiv.style.color = '#155724';
                    messageDiv.style.border = '1px solid #c3e6cb';
                } else if (status === 'error') {
                    messageDiv.style.backgroundColor = '#f8d7da';
                    messageDiv.style.color = '#721c24';
                    messageDiv.style.border = '1px solid #f5c6cb';
                }

                // Opcional: Limpar os parâmetros da URL e a mensagem depois de um tempo
                setTimeout(() => {
                    const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                    window.history.replaceState({ path: newUrl }, '', newUrl);
                    messageDiv.remove();
                }, 5000);
            }
        });
    </script>
</body>
</html>