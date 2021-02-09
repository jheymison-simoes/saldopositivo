
<?php 
    /**
     * Página Front-edn Confirma Cadastro usuário
     */

    /**
     * Página front-end onde confirma o cadastro de usuário foi realizado com sucesso!
     * @package pages/usuarios
     * 
     * @return void
     */
    function confirma_cadastro(){
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

                    <h3>Cadastro Realizado com Sucesso!</h3>
                    <a href="<?php echo $index ?>" class="btn btn-success">Entre no Site</a>
                </div>
            </div>
        </div>
    </div>
<?php }; ?>
<?php confirma_cadastro(); ?>
