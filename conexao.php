<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "senaiflix_fabricio";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);
if ($conexao->connect_error) {
die("Erro na conexão". $conexao->connect_error);
}

?>
