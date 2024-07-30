<?php
include("conexao.php");

$id = $_GET['id'];
$query = "SELECT * FROM assinaturas WHERE id='$id'";
$resultado = $conexao->query($query);
$linha = $resultado->fetch_assoc();
?>

<form method="post" action="index.php?pagina=assinaturas_edita_salvar" class="mt-3" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
    <div class="mb-3">
        <label for="id_cliente" class="form-label" style="color:white;">ID Cliente:</label>
        <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="<?php echo $linha['id_cliente']; ?>">
    </div>
    <div class="mb-3">
        <label for="plano" class="form-label" style="color:white;">Plano:</label>
        <input type="text" class="form-control" id="plano" name="plano" value="<?php echo $linha['plano']; ?>">
    </div>
    <div class="mb-3">
        <label for="data_inicio" class="form-label" style="color:white;">Data Início:</label>
        <input type="text" class="form-control" id="data_inicio" name="data_inicio" value="<?php echo $linha['data_inicio']; ?>">
    </div>
    <div class="mb-3">
        <label for="data_fim" class="form-label" style="color:white;">Data Fim:</label>
        <input type="text" class="form-control" id="data_fim" name="data_fim" value="<?php echo $linha['data_fim']; ?>">
    </div>
    <div class="mb-3">
        <label for="data_cadastro" class="form-label" style="color:white;">Data Cadastro:</label>
        <input type="text" class="form-control" id="data_cadastro" name="data_cadastro" value="<?php echo $linha['data_cadastro']; ?>">
    </div>
    <div class="mb-3">
        <label for="data_atualizacao" class="form-label" style="color:white;">Data Atualização:</label>
        <input type="text" class="form-control" id="data_atualizacao" name="data_atualizacao" value="<?php echo $linha['data_atualizacao']; ?>">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label" style="color:white;">Status:</label>
        <input type="text" class="form-control" id="status" name="status" value="<?php echo $linha['status']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" value="Salvar">
</form>
