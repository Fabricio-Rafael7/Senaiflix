<?php 
session_start();
require_once "conexao.php";

// Verificar se a requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se todos os campos obrigatórios foram recebidos
    if (isset($_POST["titulo"], $_POST["descricao"], $_POST["ano_lancamento"], $_POST["genero"], $_POST["classificacao"], $_FILES["imagem"], $_POST["midia"])) {
        
        // Atribuir valores recebidos do formulário às variáveis
        $titulo = $_POST["titulo"];
        $descricao = $_POST["descricao"];
        $ano_lancamento = $_POST["ano_lancamento"];
        $genero = $_POST["genero"];
        $classificacao = $_POST["classificacao"];
        $midia = $_POST["midia"];
        
        // Data de cadastro e atualização
        $data_cadastro = date("Y-m-d H:i:s");
        $data_atualizacao = $data_cadastro;
        
        // Status padrão
        $status = 0; // Aqui você pode definir o status padrão desejado
        
        // Processar upload da imagem
        $imagem = $_FILES["imagem"];
        $imagem_nome_original = basename($imagem["name"]);
        $imagem_nome = uniqid() . '_' . $imagem_nome_original; // Nome único com prefixo único
        
        $imagem_diretorio = "img/fotos/" . $imagem_nome;
        $imagem_tipo = strtolower(pathinfo($imagem_diretorio, PATHINFO_EXTENSION));
        $imagem_tamanho = $imagem["size"];
        $uploadOk = 1;
        
        // Verificar se o arquivo é uma imagem real
        $check = getimagesize($imagem["tmp_name"]);
        if($check === false) {
            echo "<script>alert('Arquivo não é uma imagem.')</script>";
            $uploadOk = 0;
        }
        
        // Verificar tamanho do arquivo (5MB máximo)
        if ($imagem_tamanho > 5000000) {
            echo "<script>alert('Arquivo muito grande.')</script>";
            $uploadOk = 0;
        }
        
        // Permitir apenas certos formatos de arquivo
        if($imagem_tipo != "jpg" && $imagem_tipo != "png" && $imagem_tipo != "jpeg" && $imagem_tipo != "gif" ) {
            echo "<script>alert('Somente arquivos JPG, JPEG, PNG & GIF são permitidos.')</script>";
            $uploadOk = 0;
        }
        
        // Verificar se $uploadOk está configurado para 0 por um erro
        if ($uploadOk == 0) {
            echo "<script>alert('Desculpe, seu arquivo não foi enviado.')</script>";
        } else {
            if (move_uploaded_file($imagem["tmp_name"], $imagem_diretorio)) {
                // Preparar a consulta SQL para inserir os dados no banco de dados
                $stmt_insert = $conexao->prepare("INSERT INTO filmes (titulo, descricao, ano_lancamento, genero, classificacao, imagem, midia, data_cadastro, data_atualizacao, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                if (!$stmt_insert) {
                    echo "<script>alert('Erro ao preparar a consulta.')</script>";
                    echo "Erro: " . $conexao->error;
                } else {
                    $stmt_insert->bind_param("ssissssssi", $titulo, $descricao, $ano_lancamento, $genero, $classificacao, $imagem_nome, $midia, $data_cadastro, $data_atualizacao, $status);
                    
                    if ($stmt_insert->execute()) {
                        echo "<script>alert('Filme cadastrado com sucesso.')</script>";
                    } else {
                        echo "<script>alert('Erro ao cadastrar filme. Tente novamente.')</script>";
                        // Exibir mensagem de erro do MySQL (opcional para debug)
                        echo "Erro: " . $stmt_insert->error;
                    }
                }
                $stmt_insert->close();
            } else {
                echo "<script>alert('Desculpe, houve um erro ao enviar seu arquivo.')</script>";
            }
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.')</script>";
    }
    
    // Redirecionamento após o processamento
    echo "<script>alert('Redirecionando...'); window.location.href = 'index.php?pagina=filmes_listar';</script>";
    exit(); // Certifique-se de sair do script após o redirecionamento
} else {
    // Redirecionamento se a requisição não for POST
    echo "<script>alert('Método de requisição não é POST. Redirecionando...'); window.location.href = 'index.php?pagina=filmes_cadastrar';</script>";
    exit();
}
?>
