<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar a declaração SQL
    $stmt = $conexao->prepare("DELETE FROM filmes WHERE id = ?");
    if ($stmt === false) {
        echo "<script>alert('Erro ao preparar a declaração: " . addslashes($conexao->error) . "');</script>";
        exit();
    }

    // Vincular parâmetros
    $stmt->bind_param("i", $id);

    // Executar a declaração
    if ($stmt->execute()) {
        echo "<script>alert('Filme removido com sucesso!'); window.location.href = 'index.php?pagina=filmes_listar';</script>";
    } else {
        echo "<script>alert('Erro ao remover o filme: " . addslashes($stmt->error) . "');</script>";
    }

    // Fechar a declaração
    $stmt->close();
} else {
    echo "<script>alert('ID do filme não fornecido.');</script>";
}

// Fechar a conexão
$conexao->close();
?>
