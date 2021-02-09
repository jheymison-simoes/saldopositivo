<?php 
    /**
     * Página Front-end Contem Cadastro
     */

    /**
     * Página front-end onde informa ao usuario que ja possui cadastro no site!
     * @package pages/usuarios
     * 
     * @return void
     */
    function contem_cadastro(){
        // Importando links
        include("routes/links.php");
?>
    <div id="conf_cadastro" class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-6">
            <div class="card card-nav-tabs text-center">
                <div class="card-header card-header-warning"> 
                    <i class="material-icons" style="font-size: 80px">assignment_late</i>
                </div>
                <div class="card-body">
                    <h3>Este e-mail já esta cadastrado!</h3>
                    <a href="<?php echo $index ?>" class="btn btn-success">Faça Login</a>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo $page_esqueceu_senha ?>" class="btn btn-warning btn-link">
                        <span class="material-icons">
                            notification_important
                        </span>
                        Esqueceu a Senha?
                    <a>
                </div>
            </div>
        </div>
    </div>
<?php }; ?>
<?php contem_cadastro(); ?>
