<?php
include 'conexao.php'; // Inclui o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário e sanitiza
    $nome = htmlspecialchars(trim($_POST['nome']));
    $endereco = htmlspecialchars(trim($_POST['endereco']));
    $cpf = htmlspecialchars(trim($_POST['cpf']));
    $data_nascimento_str = htmlspecialchars(trim($_POST['data_nascimento']));
    $telefone = htmlspecialchars(trim($_POST['telefone']));

    // Validação básica
    if (empty($nome) || empty($endereco) || empty($cpf) || empty($data_nascimento_str) || empty($telefone)) {
        header("Location: index.html?status=erro&mensagem=" . urlencode("Todos os campos são obrigatórios."));
        exit();
    }

    // Validação de CPF (apenas números)
    if (!preg_match('/^\d{11}$/', $cpf)) {
        header("Location: index.html?status=erro&mensagem=" . urlencode("CPF deve conter 11 dígitos numéricos."));
        exit();
    }

    // Validação de Telefone (10 ou 11 dígitos numéricos)
    if (!preg_match('/^\d{10,11}$/', $telefone)) {
        header("Location: index.html?status=erro&mensagem=" . urlencode("Telefone deve conter 10 ou 11 dígitos numéricos."));
        exit();
    }

    // Converte a data de nascimento para o formato YYYY-MM-DD para o PostgreSQL
    try {
        $data_nascimento = new DateTime($data_nascimento_str);
        $data_nascimento_formatada = $data_nascimento->format('Y-m-d');
    } catch (Exception $e) {
        header("Location: index.html?status=erro&mensagem=" . urlencode("Formato de data de nascimento inválido."));
        exit();
    }

    try {
        // Prepara a consulta SQL para inserir os dados
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, endereco, cpf, data_nascimento, telefone) VALUES (?, ?, ?, ?, ?)");

        // Executa a consulta com os valores
        $stmt->execute([$nome, $endereco, $cpf, $data_nascimento_formatada, $telefone]);

        // Redireciona de volta para a página principal com uma mensagem de sucesso
        header("Location: index.html?status=sucesso&mensagem=" . urlencode("Usuário adicionado com sucesso!"));
        exit();
    } catch (PDOException $e) {
        // Verifica se o erro é de CPF duplicado
        if ($e->getCode() == '23505') { // Código de erro para violação de unique_constraint no PostgreSQL
            header("Location: index.html?status=erro&mensagem=" . urlencode("Erro: CPF já cadastrado."));
        } else {
            header("Location: index.html?status=erro&mensagem=" . urlencode("Erro ao adicionar usuário: " . $e->getMessage()));
        }
        exit();
    }
} else {
    // Se o acesso não foi via POST, redireciona para a página principal
    header("Location: index.html");
    exit();
}
?>