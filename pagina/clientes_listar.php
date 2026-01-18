<?php
include("conexao.php");

$sql = "SELECT * FROM clientes";
$resultado = $conexao->query($sql);

?>

<h1 style="color:white;">Listagem de Clientes</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" style="color:white;">ID</th>
            <th scope="col" style="color:white;">Nome</th>
            <th scope="col" style="color:white;">E-mail</th>
            <th scope="col" style="color:white;">CPF</th>
            <th scope="col" style="color:white;">Editar</th>
            <th scope="col" style="color:white;">Remover</th>
        </tr>
    </thead>
    <tbody>
    <?php
    while ($linha = $resultado->fetch_assoc()) {
    ?>
        <tr>
            <td style="color:white;"><?php echo htmlspecialchars($linha['id']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['nome']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['email']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['cpf']); ?></td>
            <td>
                <a href='index.php?pagina=clientes_edita&id=<?php echo htmlspecialchars($linha['id']); ?>'>
                    <button class='btn btn-primary'>
                        Editar
                    </button>
                </a>
            </td>
            <td>
                <a href='index.php?pagina=clientes_remover&id=<?php echo htmlspecialchars($linha['id']); ?>'>
                    <button class='btn btn-danger'>
                        Remover
                    </button>
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
<div class="col-md-4 mb-3">
                <a href="index.php?pagina=home_adm" class="btn btn-danger btn-lg btn-block">Home ADM</a>
            </div>
<?php
$conexao->close();
?>