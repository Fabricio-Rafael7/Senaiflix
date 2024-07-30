<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Use prepared statement para evitar SQL Injection
    $stmt = $conexao->prepare("SELECT nome FROM usuarios WHERE usuario = ? AND senha = SHA2(?, 256)");
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $stmt->store_result();

    // Se encontrar o usuário com a senha correspondente
    if ($stmt->num_rows > 0) {
        // Registra o nome do usuário em sessão
        $stmt->bind_result($nome);
        $stmt->fetch();

        $_SESSION['usuario'] = $usuario;
        $_SESSION['nome'] = $nome;

        header('Location: index.php?pagina=home_adm');
        exit();
    } else {
        echo "<script>alert('Usuário ou senha inválidos.')</script>";
        header('Location: index.php?pagina=login_adm');
    }

    $stmt->close();
} else {
    echo "<script>alert('Envio de forma errada')</script>";
    header('Location: index.php?pagina=login_adm');
    exit();
}

$conexao->close();
?>
