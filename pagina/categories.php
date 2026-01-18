<?php
session_start();
include("conexao.php");

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header('Location: index.php?pagina=login');
    exit();
}

// Inicializa variável para o filtro de gênero
$where_clause = "";

// Verifica se foi passado o parâmetro 'genero' na URL
if (isset($_GET['genero'])) {
    $genero = $_GET['genero'];
    
    // Monta a cláusula WHERE para filtrar pelo gênero
    $where_clause = " WHERE genero = '" . $conexao->real_escape_string($genero) . "'";
}

// Consulta SQL para buscar filmes com filtro opcional por gênero
$sql = "SELECT * FROM filmes" . $where_clause;
$resultado = $conexao->query($sql);
?>

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="./categories.php">Categories</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Section Begin -->
<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="section-title">
                                    <?php if (!empty($genero)) : ?>
                                        <h4><?php echo $genero; ?></h4>
                                    <?php else : ?>
                                        <h4>Todos os Filmes</h4>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        while ($linha = $resultado->fetch_assoc()) {
                            $midia = $linha['midia'];
                        ?>
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
            <div class="col-lg-4">
                <div class="product__sidebar">
                    <div class="section-title">
                        <h5>Gêneros</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="index.php?pagina=categories&genero=Comedia" class="btn btn-danger btn-lg btn-block">Comédia</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="index.php?pagina=categories&genero=Drama" class="btn btn-danger btn-lg btn-block">Drama</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="index.php?pagina=categories&genero=Terror" class="btn btn-danger btn-lg btn-block">Terror</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="index.php?pagina=categories&genero=Acao" class="btn btn-danger btn-lg btn-block">Ação </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="index.php?pagina=categories&genero=Suspense" class="btn btn-danger btn-lg btn-block">Suspense</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


