<?php 
include("conexao.php");

$id = $_POST['id'];
$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$cep = $_POST["cep"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$telefone = $_POST["telefone"];

$query = "UPDATE clientes SET nome='$nome', email='$email', cpf='$cpf', cep='$cep', endereco='$endereco', numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado', telefone='$telefone' WHERE id='$id'";

if ($conexao->query($query) === TRUE) {
    echo "<script>alert('Cliente atualizado com sucesso!')</script>";
    echo "<script>window.location.replace('index.php?pagina=clientes_listar');</script>";
} else {
    echo "Erro ao atualizar cliente: " . $conexao->error;
}

$conexao->close();
?>
