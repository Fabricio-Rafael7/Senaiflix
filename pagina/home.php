<?php
session_start();
include("conexao.php");

$sql = "SELECT * FROM filmes";
$resultado = $conexao->query($sql);


// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header('Location: index.php?pagina=login');
    exit();
}
?>



    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Assista agora</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                            </div>
                        </div>
                        <?php
    while ($linha = $resultado->fetch_assoc()) {
        $midia = $linha['midia'];
    ?>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg">
                                        <img src="img/fotos/<?php echo htmlspecialchars($linha['imagem']); ?>">
                                        
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?php echo htmlspecialchars($linha['genero']); ?></li>
                                            <li><?php echo htmlspecialchars($linha['titulo']); ?></li>
                                        </ul>
                                        <h5><a href="#"><?php echo htmlspecialchars($linha['titulo']); ?></a></h5>
                                        <div class="col-md-4 mb-3">
                                        <a href="index.php?pagina=hospedar&midia=<?php echo $midia ?>" style="width: 150px;" class="btn btn-danger btn-lg btn-block">Assistir</a>

            </div>
                                    </div>
                                </div>
                            </div>
                            <?php
    }
    ?>
    </div>
    </div>
</div>
</div>
</div>
</section>
<div class="col-md-4 mb-3">
                <a href="sair.php" class="btn btn-danger btn-lg btn-block">Sair</a>
            </div>
<!-- Product Section End -->