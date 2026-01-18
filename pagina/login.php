<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: index.php?pagina=home');
    exit();
}
?>

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Login</h2>
                        <p>Bem Vindo de volta ao Senai Flix.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Login</h3>
                        <form action="autenticar.php" method="POST">
                            <div class="input__item">
                                <input type="text" id="email" name="email" placeholder="Email">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" id="senha" name="senha" placeholder="Senha">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Entrar</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Não tem conta?</h3>
                        <a href="index.php?pagina=signup" class="primary-btn">Registre-se agora</a>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With Facebook</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  