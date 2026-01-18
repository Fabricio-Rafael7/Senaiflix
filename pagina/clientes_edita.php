<?php 
include("conexao.php");

$id = $_GET['id'];
$query= "SELECT * FROM clientes WHERE id='$id'";
$resultado=$conexao->query($query);
$linha = $resultado->fetch_assoc();
?>
<form method="post" action="index.php?pagina=clientes_edita_salvar" class="mt-3" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
    <div class="mb-3">
        <label for="nome" class="form-label" style="color:white;">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $linha['nome']; ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label" style="color:white;">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $linha['email']; ?>">
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label" style="color:white;">Telefone:</label>
        <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $linha['telefone']; ?>">
    </div>
    <div class="mb-3">
        <label for="cpf" class="form-label" style="color:white;">CPF:</label>
        <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $linha['cpf']; ?>">
    </div>
    <div class="mb-3">
        <label for="cep" class="form-label" style="color:white;">CEP:</label>
        <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $linha['cep']; ?>">
    </div>
    <div class="mb-3">
        <label for="endereco" class="form-label" style="color:white;">Endereço:</label>
        <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $linha['endereco']; ?>">
    </div>
    <div class="mb-3">
        <label for="numero" class="form-label" style="color:white;">Número:</label>
        <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $linha['numero']; ?>">
    </div>
    <div class="mb-3">
        <label for="bairro" class="form-label" style="color:white;">Bairro:</label>
        <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $linha['bairro']; ?>">
    </div>
    <div class="mb-3">
        <label for="cidade" class="form-label" style="color:white;">Cidade:</label>
        <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $linha['cidade']; ?>">
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label" style="color:white;">Estado:</label>
        <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $linha['estado']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" value="Salvar">
</form>

