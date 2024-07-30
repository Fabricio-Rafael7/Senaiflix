<?php
include("conexao.php");

$id = $_GET['id'];
$sql = "DELETE FROM assinaturas WHERE id ='$id'";
$conexao->query($sql);

header("Location: index.php?pagina=assinaturas_listar");
?>