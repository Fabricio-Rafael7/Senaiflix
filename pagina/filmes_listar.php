<?php
session_start();
include("conexao.php");

$sql = "SELECT * FROM filmes";
$resultado = $conexao->query($sql);
if (isset($_SESSION['usuario'])) {
    header('Location: index.php?pagina=home_adm');
    exit();
}
?>

<h1 style="color:white;">Listagem de Filmes</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" style="color:white;">ID</th>
            <th scope="col" style="color:white;">Título</th>
            <th scope="col" style="color:white;">Descrição</th>
            <th scope="col" style="color:white;">Ano de Lançamento</th>
            <th scope="col" style="color:white;">Gênero</th>
            <th scope="col" style="color:white;">Classificação</th>
            <th scope="col" style="color:white;">Data de Cadastro</th>
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
            <td style="color:white;"><?php echo htmlspecialchars($linha['titulo']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['descricao']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['ano_lancamento']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['genero']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['classificacao']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['data_cadastro']); ?></td>
            <td>
                <a href='index.php?pagina=filmes_edita&id=<?php echo htmlspecialchars($linha['id']); ?>'>
                    <button class='btn btn-primary'>
                        Editar
                    </button>
                </a>
            </td>
            <td>
                <a href='index.php?pagina=filmes_remover&id=<?php echo htmlspecialchars($linha['id']); ?>' onclick='return confirmarRemocao()'>
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