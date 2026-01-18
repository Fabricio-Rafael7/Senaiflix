<?php
require_once "conexao.php";

// Verifique se a requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se todos os campos obrigatórios foram recebidos
    if (isset($_POST["nome"], $_POST["email"], $_POST["senha"], $_POST["cpf"], $_POST["cep"], $_POST["uf"], $_POST["cidade"], $_POST["bairro"], $_POST["endereco"], $_POST["numero"], $_POST["telefone"])) {
        
        // Atribuir valores recebidos do formulário às variáveis
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST["cpf"];
        $cep = $_POST["cep"];
        $estado = $_POST["uf"];
        $cidade = $_POST["cidade"];
        $bairro = $_POST["bairro"];
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];
        $telefone = $_POST["telefone"];
        
        // Data de cadastro e atualização
        $data_cadastro = date("Y-m-d H:i:s");
        $data_atualizacao = $data_cadastro;
        
        // Status padrão
        $status = 0;
        
        // Verificar se o email já está registrado
        $stmt = $conexao->prepare("SELECT id FROM clientes WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            echo "<script>alert('Usuário já existe. Tente outro nome de usuário.')</script>";
        } else {
            // Preparar a consulta SQL para inserir os dados no banco de dados
            $stmt = $conexao->prepare("INSERT INTO clientes (nome, cpf, email, cep, senha, telefone, endereco, numero, bairro, cidade, estado, data_cadastro, data_atualizacao, status) VALUES (?, ?, ?, ?, SHA2(?, 256), ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssssssi", $nome, $cpf, $email, $cep, $senha, $telefone, $endereco, $numero, $bairro, $cidade, $estado, $data_cadastro, $data_atualizacao, $status);
            if ($stmt->execute()) {
                echo "<script>alert('Usuário cadastrado com sucesso.')</script>";
                
            } else {
                echo "<script>alert('Erro ao cadastrar usuário. Tente novamente.')</script>";
                // Exibir mensagem de erro do MySQL (opcional para debug)
                echo "Erro: " . $conexao->error;
            }
        }
        
        $stmt->close();
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.')</script>";
    }
    
    // Redirecionamento após o processamento
    echo "<script>alert('Redirecionando...')</script>";
    header("Location: index.php?pagina=home");
    exit(); // Certifique-se de sair do script após o redirecionamento
} else {
    // Redirecionamento se a requisição não for POST
    echo "<script>alert('Método de requisição não é POST. Redirecionando...')</script>";
    header("Location: index.php?pagina=signup");
    exit();
}
?>