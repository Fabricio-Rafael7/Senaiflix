<?php
session_start();
// Verifica se o usuário está logado
if (isset($_SESSION['usuario'])) {
    header('Location: index.php?pagina=home_adm');
    exit();
}
include("conexao.php");

$sql = "SELECT * FROM assinaturas";
$resultado = $conexao->query($sql);

?>

<h1 style="color:white;">Listagem de Assinaturas</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" style="color:white;">ID</th>
            <th scope="col" style="color:white;">ID Cliente</th>
            <th scope="col" style="color:white;">Plano</th>
            <th scope="col" style="color:white;">Data Início</th>
            <th scope="col" style="color:white;">Data Fim</th>
            <th scope="col" style="color:white;">Data Cadastro</th>
            <th scope="col" style="color:white;">Data Atualização</th>
            <th scope="col" style="color:white;">Status</th>
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
            <td style="color:white;"><?php echo htmlspecialchars($linha['id_cliente']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['plano']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['data_inicio']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['data_fim']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['data_cadastro']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['data_atualizacao']); ?></td>
            <td style="color:white;"><?php echo htmlspecialchars($linha['status']); ?></td>
            <td>
                <a href='index.php?pagina=assinaturas_edita&id=<?php echo htmlspecialchars($linha['id']); ?>'>
                    <button class='btn btn-primary'>
                        Editar
                    </button>
                </a>
            </td>
            <td>
                <a href='index.php?pagina=assinaturas_remover&id=<?php echo htmlspecialchars($linha['id']); ?>'>
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