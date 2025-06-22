<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu-buttons">
        <a href="index.html" class="add-btn">Adicionar</a>
        <a href="consultar.php" class="consult-btn">Consultar</a>
        <a href="editar.php" class="edit-btn active">Editar</a>
        <a href="deletar.php" class="delete-btn">Deletar</a>
    </div>

    <div class="container edit-form-container">
        <h2>Editar Usuário</h2>

        <?php
        include 'conexao.php'; // Inclui o arquivo de conexão

        $usuario = null;
        $id_usuario = null;

        // Processa a submissão do formulário de edição
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_usuario'])) {
            $id_usuario = htmlspecialchars(trim($_POST['id_usuario']));
            $nome = htmlspecialchars(trim($_POST['nome']));
            $endereco = htmlspecialchars(trim($_POST['endereco']));
            $cpf = htmlspecialchars(trim($_POST['cpf']));
            $data_nascimento_str = htmlspecialchars(trim($_POST['data_nascimento']));
            $telefone = htmlspecialchars(trim($_POST['telefone']));

            // Validação básica
            if (empty($nome) || empty($endereco) || empty($cpf) || empty($data_nascimento_str) || empty($telefone)) {
                echo "<p class='message error'>Todos os campos são obrigatórios.</p>";
                // Re-buscar usuário para preencher o formulário novamente após erro
                try {
                    $stmt = $pdo->prepare("SELECT id, nome, endereco, cpf, data_nascimento, telefone FROM usuarios WHERE id = ?");
                    $stmt->execute([$id_usuario]);
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo "<p class='message error'>Erro ao buscar usuário para reexibir formulário: " . $e->getMessage() . "</p>";
                }
            } else {
                 // Validação de CPF (apenas números)
                if (!preg_match('/^\d{11}$/', $cpf)) {
                    echo "<p class='message error'>CPF deve conter 11 dígitos numéricos.</p>";
                    try { $stmt = $pdo->prepare("SELECT id, nome, endereco, cpf, data_nascimento, telefone FROM usuarios WHERE id = ?"); $stmt->execute([$id_usuario]); $usuario = $stmt->fetch(PDO::FETCH_ASSOC); } catch (PDOException $e) {}
                }
                // Validação de Telefone (10 ou 11 dígitos numéricos)
                else if (!preg_match('/^\d{10,11}$/', $telefone)) {
                    echo "<p class='message error'>Telefone deve conter 10 ou 11 dígitos numéricos.</p>";
                    try { $stmt = $pdo->prepare("SELECT id, nome, endereco, cpf, data_nascimento, telefone FROM usuarios WHERE id = ?"); $stmt->execute([$id_usuario]); $usuario = $stmt->fetch(PDO::FETCH_ASSOC); } catch (PDOException $e) {}
                } else {
                    // Converte a data de nascimento para o formato YYYY-MM-DD
                    try {
                        $data_nascimento = new DateTime($data_nascimento_str);
                        $data_nascimento_formatada = $data_nascimento->format('Y-m-d');
                    } catch (Exception $e) {
                        echo "<p class='message error'>Formato de data de nascimento inválido.</p>";
                        try { $stmt = $pdo->prepare("SELECT id, nome, endereco, cpf, data_nascimento, telefone FROM usuarios WHERE id = ?"); $stmt->execute([$id_usuario]); $usuario = $stmt->fetch(PDO::FETCH_ASSOC); } catch (PDOException $e) {}
                    }

                    if (isset($data_nascimento_formatada)) {
                        try {
                            // Prepara a consulta SQL para atualizar os dados
                            $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, endereco = ?, cpf = ?, data_nascimento = ?, telefone = ? WHERE id = ?");
                            $stmt->execute([$nome, $endereco, $cpf, $data_nascimento_formatada, $telefone, $id_usuario]);

                            echo "<p class='message success'>Usuário atualizado com sucesso!</p>";
                            echo "<p><a href='consultar.php' class='back-button'>Voltar à consulta</a></p>";
                            // Após sucesso, re-buscar o usuário para garantir que o formulário reflita os dados atualizados
                            $stmt = $pdo->prepare("SELECT id, nome, endereco, cpf, data_nascimento, telefone FROM usuarios WHERE id = ?");
                            $stmt->execute([$id_usuario]);
                            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                        } catch (PDOException $e) {
                            if ($e->getCode() == '23505') { // CPF duplicado
                                echo "<p class='message error'>Erro: CPF já cadastrado para outro usuário.</p>";
                            } else {
                                echo "<p class='message error'>Erro ao atualizar usuário: " . $e->getMessage() . "</p>";
                            }
                            // Re-buscar usuário para preencher o formulário novamente após erro
                            try {
                                $stmt = $pdo->prepare("SELECT id, nome, endereco, cpf, data_nascimento, telefone FROM usuarios WHERE id = ?");
                                $stmt->execute([$id_usuario]);
                                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                            } catch (PDOException $e_re_fetch) {
                                echo "<p class='message error'>Erro ao re-buscar usuário após falha na atualização: " . $e_re_fetch->getMessage() . "</p>";
                            }
                        }
                    }
                }
            }
        } else if (isset($_GET['id'])) { // Carrega o formulário para edição
            $id_usuario = htmlspecialchars($_GET['id']);

            try {
                $stmt = $pdo->prepare("SELECT id, nome, endereco, cpf, data_nascimento, telefone FROM usuarios WHERE id = ?");
                $stmt->execute([$id_usuario]);
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$usuario) {
                    echo "<p class='message error'>Usuário não encontrado.</p>";
                    echo "<p><a href='consultar.php' class='back-button'>Voltar à consulta</a></p>";
                }
            } catch (PDOException $e) {
                echo "<p class='message error'>Erro ao buscar usuário para edição: " . $e->getMessage() . "</p>";
                echo "<p><a href='consultar.php' class='back-button'>Voltar à consulta</a></p>";
            }
        } else {
            echo "<p class='message'>Selecione um usuário para editar na aba 'Consultar'.</p>";
        }

        // Exibe o formulário de edição se um usuário foi encontrado ou está sendo processado
        if ($usuario) {
        ?>
            <form action="editar.php" method="POST">
                <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($usuario['id']); ?>">

                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>

                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($usuario['endereco']); ?>" required>

                <label for="cpf">CPF (apenas números):</label>
                <input type="text" id="cpf" name="cpf" maxlength="11" pattern="\d{11}" title="Apenas 11 dígitos numéricos" value="<?php echo htmlspecialchars($usuario['cpf']); ?>" required>

                <label for="data_nascimento">Data de Nascimento (AAAA-MM-DD):</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($usuario['data_nascimento']); ?>" required>

                <label for="telefone">Telefone (apenas números):</label>
                <input type="text" id="telefone" name="telefone" maxlength="11" pattern="\d{10,11}" title="Apenas 10 ou 11 dígitos numéricos" value="<?php echo htmlspecialchars($usuario['telefone']); ?>" required>

                <input type="submit" value="Salvar Edição">
            </form>
        <?php
        }
        ?>
    </div>
</body>
</html>