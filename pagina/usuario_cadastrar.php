<section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Cadastro de ADM</h2>
                        <p>Não tente se não for funcionario.</p>
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
                        <h3>Cadastre-se</h3>
                        <form method="post" action="usuarios_cadastro_salvar.php" class="mt-3" enctype="multipart/form-data">
                            <div class="input__item">
                                <input type="text" id="email" name="email" placeholder="Email">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" id="nome" name="nome" placeholder="Nome">
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" id="senha" name="senha" placeholder="Senha">
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" id="usuario" name="usuario" placeholder="Usuário">
                                <span class="bi bi-person-circle"></span>
                            </div>
                           
                            <button type="submit" class="site-btn">Cadastre!</button>
                        </form>
                        <h5>Já possui uma conta? <a href="index.php?pagina=login_adm">Entre!</a></h5>
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