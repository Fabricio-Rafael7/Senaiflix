<?php 
include("conexao.php");

$id = $_GET['id'];
$query = "SELECT * FROM filmes WHERE id='$id'";
$resultado = $conexao->query($query);
$linha = $resultado->fetch_assoc();
?>
<form method="post" action="index.php?pagina=filmes_edita_salvar" class="mt-3" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['id']); ?>">
    <div class="mb-3">
        <label for="titulo" class="form-label" style="color:white;">Título:</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($linha['titulo']); ?>">
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label" style="color:white;">Descrição:</label>
        <textarea class="form-control" id="descricao" name="descricao"><?php echo htmlspecialchars($linha['descricao']); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="ano_lancamento" class="form-label" style="color:white;">Ano de Lançamento:</label>
        <input type="text" class="form-control" id="ano_lancamento" name="ano_lancamento" value="<?php echo htmlspecialchars($linha['ano_lancamento']); ?>">
    </div>
    <div class="mb-3">
        <label for="genero" class="form-label" style="color:white;">Gênero:</label>
        <input type="text" class="form-control" id="genero" name="genero" value="<?php echo htmlspecialchars($linha['genero']); ?>">
    </div>
    <div class="mb-3">
        <label for="classificacao" class="form-label" style="color:white;">Classificação:</label>
        <input type="text" class="form-control" id="classificacao" name="classificacao" value="<?php echo htmlspecialchars($linha['classificacao']); ?>">
    </div>
    <div class="mb-3">
        <label for="imagem" class="form-label" style="color:white;">Imagem:</label>
        <input type="text" class="form-control" id="imagem" name="imagem" value="<?php echo htmlspecialchars($linha['imagem']); ?>">
    </div>
    <div class="mb-3">
        <label for="midia" class="form-label" style="color:white;">Mídia:</label>
        <input type="text" class="form-control" id="midia" name="midia" value="<?php echo htmlspecialchars($linha['midia']); ?>">
    </div>
    <input type="submit" class="btn btn-primary" value="Salvar">
</form>

<div class="col-md-4 mb-3">
    <a href="index.php?pagina=home_adm" class="btn btn-danger btn-lg btn-block">Home ADM</a>
</div>

<?php
$conexao->close();
?>
