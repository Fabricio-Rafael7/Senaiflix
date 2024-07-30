<?php
session_start();

// Verifica se o usuário está logado

if (isset($_SESSION['usuario'])) {
    header('Location: index.php?pagina=home_adm');
    exit();
}
?>
 <div class="container mt-5">
        <h1 style="color: white;">Menu de Botões</h1>
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <a href="index.php?pagina=clientes_listar" class="btn btn-primary btn-lg btn-block">Listar Clientes</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="index.php?pagina=filmes_listar" class="btn btn-success btn-lg btn-block">Listar Filmes</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="index.php?pagina=filmes_cadastrar" class="btn btn-info btn-lg btn-block">Adicionar Filmes</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="index.php?pagina=usuario_listar" class="btn btn-warning btn-lg btn-block">Listar Usuários</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="index.php?pagina=usuario_cadastrar" class="btn btn-danger btn-lg btn-block">Adicionar Usuários</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="index.php?pagina=assinaturas_listar" class="btn btn-danger btn-lg btn-block">Listar assinaturas</a>
            </div>
            
            <div class="col-md-4 mb-3">
                <a href="sair.php" class="btn btn-danger btn-lg btn-block">Sair</a>
            </div>
        </div>

    </div>