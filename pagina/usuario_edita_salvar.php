<?php 
include("conexao.php");

$id = $_POST['id'];
$nome = $_POST["nome"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];

$query = "UPDATE usuarios SET nome='$nome', email='$email', usuario='$usuario' WHERE id='$id'";

if ($conexao->query($query) === TRUE) {
    echo "<script>alert('Usuario atualizado com sucesso!')</script>";
    echo "<script>window.location.replace('index.php?pagina=usuario_listar');</script>";
} else {
    echo "Erro ao atualizar cliente: " . $conexao->error;
}

$conexao->close();
?>