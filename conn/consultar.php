<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu-buttons">
        <a href="index.html" class="add-btn">Adicionar</a>
        <a href="consultar.php" class="consult-btn active">Consultar</a>
        <a href="editar.php" class="edit-btn">Editar</a>
        <a href="deletar.php" class="delete-btn">Deletar</a>
    </div>

    <div class="container">
        <h2>Consultar Usuários</h2>

        <?php
        include 'conexao.php'; // Inclui o arquivo de conexão

        // Mensagens de Status (recebidas via GET de outras páginas)
        if (isset($_GET['status']) && isset($_GET['mensagem'])) {
            $status = htmlspecialchars($_GET['status']);
            $mensagem = htmlspecialchars(urldecode($_GET['mensagem']));
            echo "<div class='message $status'>$mensagem</div>";
        }

        try {
            // Prepara a consulta SQL para selecionar todos os usuários
            $stmt = $pdo->query("SELECT id, nome, endereco, cpf, data_nascimento, telefone FROM usuarios ORDER BY id DESC");
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($usuarios) > 0) {
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>CPF</th>";
                echo "<th>Data Nasc.</th>";
                echo "<th>Telefone</th>";
                echo "<th>Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($usuario['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['endereco']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['cpf']) . "</td>";
                    echo "<td>" . htmlspecialchars(date('d-m-Y', strtotime($usuario['data_nascimento']))) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['telefone']) . "</td>";
                    echo "<td class='action-links'>";
                    echo "<a href='editar.php?id=" . htmlspecialchars($usuario['id']) . "'>Editar</a> | ";
                    echo "<a href='#' onclick='confirmDelete(" . htmlspecialchars($usuario['id']) . ");' class='delete-link'>Deletar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p class='no-records'>Nenhum usuário cadastrado.</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='message error'>Erro ao consultar usuários: " . $e->getMessage() . "</p>";
        }
        ?>
    </div>

    <script>
    function confirmDelete(id) {
        if (confirm("Tem certeza que deseja deletar este usuário?")) {
            window.location.href = "deletar.php?id=" + id;
        }
    }
    </script>
</body>
</html>