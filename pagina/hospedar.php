<?php
// Verifica se o parâmetro "video" foi passado
if (isset($_GET['midia'])) {
    $midia = $_GET['midia']; // O link direto para o vídeo
}
?>


<div class="container mt-5">
    <h1 class="text-center text-danger">Assistir Filme</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white mb-4">
                <?php if (isset($midia)) { ?>
                    <video controls width="800" autoplay>
                    <source src="<?php echo $midia; ?>">
        </video>
                <?php } else { ?>
                    <p class="text-center">Nenhum vídeo disponível.</p>
                <?php } ?>
            
            </div>
        </div>
    </div>
</div>