<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar a declaração SQL
    $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = ?");
    if ($stmt === false) {
        echo "<script>alert('Erro ao preparar a declaração: " . addslashes($conexao->error) . "');</script>";
        exit();
    }

    // Vincular parâmetros
    $stmt->bind_param("i", $id);

    // Executar a declaração
    if ($stmt->execute()) {
        echo "<script>alert('Usuário removido com sucesso!'); window.location.href = 'index.php?pagina=usuario_listar';</script>";
    } else {
        echo "<script>alert('Erro ao remover o usuário: " . addslashes($stmt->error) . "');</script>";
    }

    // Fechar a declaração
    $stmt->close();
} else {
    echo "<script>alert('ID do usuário não fornecido.');</script>";
}

// Fechar a conexão
$conexao->close();
?>
