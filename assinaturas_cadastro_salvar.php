<?php
session_start();
require_once "conexao.php";

// Verificar se a requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se todos os campos obrigatórios foram recebidos
    if (isset($_POST["id_cliente"], $_POST["plano"], $_POST["data_inicio"], $_POST["data_fim"], $_POST["status"])) {
        
        // Atribuir valores recebidos do formulário às variáveis
        $id_cliente = $_POST["id_cliente"];
        $plano = $_POST["plano"];
        $data_inicio = $_POST["data_inicio"];
        $data_fim = $_POST["data_fim"];
        $status = $_POST["status"];
        
        // Data de cadastro (opcional para registrar a data de cadastro da assinatura)
        $data_cadastro = date("Y-m-d H:i:s");
        
        // Preparar a consulta SQL para inserir os dados no banco de dados
        $stmt_insert = $conexao->prepare("INSERT INTO assinaturas (id_cliente, plano, data_inicio, data_fim, data_cadastro, status) VALUES (?, ?, ?, ?, ?, ?)");
        
        if (!$stmt_insert) {
            echo "<script>alert('Erro ao preparar a consulta.')</script>";
            echo "Erro: " . $conexao->error;
        } else {
            $stmt_insert->bind_param("isssss", $id_cliente, $plano, $data_inicio, $data_fim, $data_cadastro, $status);
            
            if ($stmt_insert->execute()) {
                echo "<script>alert('Assinatura registrada com sucesso.')</script>";
            } else {
                echo "<script>alert('Erro ao registrar assinatura. Tente novamente.')</script>";
                // Exibir mensagem de erro do MySQL (opcional para debug)
                echo "Erro: " . $stmt_insert->error;
            }
        }
        
        if (isset($stmt_insert)) {
            $stmt_insert->close();
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.')</script>";
    }
    
    // Redirecionamento após o processamento
    echo "<script>window.location.href = 'index.php?pagina=home_adm';</script>";
    exit(); // Certifique-se de sair do script após o redirecionamento
} else {
    // Redirecionamento se a requisição não for POST
    echo "<script>alert('Método de requisição não é POST. Redirecionando...')</script>";
    echo "<script>window.location.href = 'index.php?pagina=usuario_cadastrar';</script>";
    exit();
}
?>
