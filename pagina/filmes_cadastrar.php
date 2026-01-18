<?php
session_start();
include("conexao.php");
if (isset($_SESSION['usuario'])) {
    header('Location: index.php?pagina=home_adm');
    exit();
}
?>

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Cadastro de Filmes</h2>
                    <p>Adicione novos filmes ao Senai Flix.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Signup Section Begin -->
<section class="signup spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Cadastro de Filmes</h3>
                    <form action="filmes_cadastro_salvar.php" method="POST" enctype="multipart/form-data">
                        <div class="input__item">
                            <input type="text" id="titulo" name="titulo" placeholder="Título">
                            <span class="icon_profile"></span>
                        </div>
                        <div class="input__item">
                            <textarea id="descricao" name="descricao" placeholder="Descrição"></textarea>
                            <span class="icon_profile"></span>
                        </div>
                        <div class="input__item">
                            <input type="date" id="ano_lancamento" name="ano_lancamento" placeholder="Ano de Lançamento">
                            <span class="icon_calendar"></span>
                        </div>
                        <div class="input__item">
                            <input type="text" id="genero" name="genero" placeholder="Gênero">
                            <span class="icon_tag"></span>
                        </div>
                        <div class="input__item">
                            <input type="text" id="classificacao" name="classificacao" placeholder="Classificação">
                            <span class="icon_star"></span>
                        </div>
                        <div class="input__item">
                            <input type="file" id="imagem" name="imagem" placeholder="Imagem">
                            <span class="icon_image"></span>
                        </div>
                        <div class="input__item">
                            <input type="text" id="midia" name="midia" placeholder="Mídia">
                            <span class="icon_film"></span>
                        </div>
                        <button type="submit" class="site-btn">Cadastrar</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__social__links">
                <div class="col-md-4 mb-3">
                <a href="index.php?pagina=home_adm" class="btn btn-danger btn-lg btn-block">Home ADM</a>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>