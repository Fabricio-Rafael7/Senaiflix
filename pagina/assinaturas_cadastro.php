<?php
// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header('Location: index.php?pagina=login');
    exit();
}
?>
<section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Registro de Assinaturas</h2>
                        <p>Preencha os campos abaixo para registrar uma nova assinatura.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login__form">
                        <h3>Registrar Assinatura</h3>
                        <form method="post" action="assinaturas_cadastro_salvar.php">
                            <div class="form-group">
                                <label for="id_cliente">ID Cliente</label>
                                <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="ID do Cliente" required>
                            </div>
                            <div class="form-group">
                                <label for="plano">Plano</label>
                                <input type="text" class="form-control" id="plano" name="plano" placeholder="Plano de Assinatura" required>
                            </div>
                            <div class="form-group">
                                <label for="data_inicio">Data de Início</label>
                                <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
                            </div>
                            <div class="form-group">
                                <label for="data_fim">Data de Fim</label>
                                <input type="date" class="form-control" id="data_fim" name="data_fim" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar Assinatura</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>