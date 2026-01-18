<?php 
include("conexao.php");

$id = $_GET['id'];
$query= "SELECT * FROM usuarios WHERE id='$id'";
$resultado=$conexao->query($query);
$linha = $resultado->fetch_assoc();
?>
<form method="post" action="index.php?pagina=usuario_edita_salvar" class="mt-3" enctype="multipart/form-data">
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
        <label for="usuario" class="form-label" style="color:white;">Usuário:</label>
        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $linha['usuario']; ?>">
    </div>
    
    <input type="submit" class="btn btn-primary" value="Salvar">
</form>