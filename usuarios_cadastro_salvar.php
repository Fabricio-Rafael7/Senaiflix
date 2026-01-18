<?php
session_start();
require_once "conexao.php";

// Verificar se a requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se todos os campos obrigatórios foram recebidos
    if (isset($_POST["nome"], $_POST["email"], $_POST["senha"], $_POST["usuario"])) {
        
        // Atribuir valores recebidos do formulário às variáveis
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $usuario = $_POST["usuario"];
        
        // Data de cadastro e atualização
        $data_cadastro = date("Y-m-d H:i:s");
        $data_atualizacao = $data_cadastro;
        
        // Status padrão
        $status = 0; // Aqui você pode definir o status padrão desejado
        
        // Verificar se o email já está registrado
        $stmt_check_email = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $stmt_check_email->store_result();
        
        if ($stmt_check_email->num_rows > 0) {
            echo "<script>alert('Usuário já existe. Tente outro email.')</script>";
        } else {
            // Preparar a consulta SQL para inserir os dados no banco de dados
            $stmt_insert = $conexao->prepare("INSERT INTO usuarios (nome, email, senha, usuario, data_cadastro, data_atualizacao, status) VALUES (?, ?, SHA2(?, 256), ?, ?, ?, ?)");
            
            if (!$stmt_insert) {
                echo "<script>alert('Erro ao preparar a consulta.')</script>";
                echo "Erro: " . $conexao->error;
            } else {
                $stmt_insert->bind_param("ssssssi", $nome, $email, $senha, $usuario, $data_cadastro, $data_atualizacao, $status);
                
                if ($stmt_insert->execute()) {
                    echo "<script>alert('Administrador cadastrado com sucesso.')</script>";
                } else {
                    echo "<script>alert('Erro ao cadastrar administrador. Tente novamente.')</script>";
                    // Exibir mensagem de erro do MySQL (opcional para debug)
                    echo "Erro: " . $stmt_insert->error;
                }
            }
        }
        
        $stmt_check_email->close();
        if (isset($stmt_insert)) {
            $stmt_insert->close();
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.')</script>";
    }
    
    // Redirecionamento após o processamento
    echo "<script>alert('Redirecionando...')</script>";
    header("Location: index.php?pagina=login_adm");
    exit(); // Certifique-se de sair do script após o redirecionamento
} else {
    // Redirecionamento se a requisição não for POST
    echo "<script>alert('Método de requisição não é POST. Redirecionando...')</script>";
    header("Location: index.php?pagina=usuario_cadastrar");
    exit();
}
?>
