
<?php 
    /**
     * Página Front-edn Confirma Alteração de Senha
     */

    /**
     * Página front-end onde confirma que a senha cadastrada foi alterada com sucesso!
     * @package pages/usuarios
     * 
     * @return void
     */
    function confirma_altera_senha(){
        // Importando links
        include("routes/links.php");
?>
    <div id="conf_cadastro" class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-6">
            <div class="card card-nav-tabs text-center">
                <div class="card-header card-header-success"> 
                    <i class="material-icons" style="font-size: 80px">thumb_up_alt</i>
                </div>
                <div class="card-body">

                    <h3>Senha Alterada com Sucesso!</h3>
                    <a href="<?php echo $index ?>" class="btn btn-success">Faça Login</a>
                </div>
            </div>
        </div>
    </div>
<?php }; ?>
<?php confirma_altera_senha(); ?>

