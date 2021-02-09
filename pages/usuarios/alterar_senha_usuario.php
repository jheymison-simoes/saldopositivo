<?php

/**
 * Página Front-end Altera Senha
 */

/**
 * Página front end para que o usuário possa alterar sua senha de login
 * @package pages/usuarios
 * 
 *
 * @return void
 */
function altera_senha() { 
    //  Validação de Erros
    include("assets/validations/validate_altera_senha.php");

    // Importando links
    include_once("routes/links.php");
?>

    <div id="altera_senha" class="row d-flex justify-content-center">
        <div class="col-lg-8 col-md-8">
            <div class="card card-nav-tabs text-center">
                <div class="card-header card-header-success"> 
                    <i class="material-icons" style="font-size: 80px">lock</i>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo $serv_altera_senha ?>">
                        <h3>Altere sua Senha!</h3>
                        <div class="row">
                            <label class="col-1 col-form-label">
                                <span class="material-icons">
                                    mail
                                </span>
                            </label>
                            <div class="col">
                                <div class="form-group bmd-form-group text-left">
                                    <label for="email_alterar" class="bmd-label-floating">Informe seu E-mail</label>
                                    <input id="email_alterar" type="text" class="form-control" name="email_alterar">
                                    <?php echo $msg_email ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-1 col-form-label">
                                <span class="material-icons">
                                    vpn_key
                                </span>
                            </label>
                            <div class="col">
                                <div class="form-group bmd-form-group text-left">
                                    <label for="senha_alterar" class="bmd-label-floating">Insira uma Senha</label>
                                    <input id="senha_alterar" type="password" class="form-control d-inline" name="senha_alterar" title="A senha deve conter ao menos 01 letra Maiuscula, 01 letra Minuscula, 01 Numero e pelo menos 06 Caracteres!">
                                    <?php echo $msg_senha ?>
                                </div>
                            </div>
                            <div class="col-0">
                                <label class="col-form-label">
                                    <span class="material-icons senha_alterar_icon" style="position: absolute; right: 15px; cursor: pointer; ">
                                        visibility
                                    </span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <label class="col-1 col-form-label">
                                <span class="material-icons">
                                    enhanced_encryption
                                </span>
                            </label>
                            <div class="col">
                                <div class="form-group bmd-form-group text-left">
                                    <label for="altconf_senha" class="bmd-label-floating">Insira Novamente a Senha</label>
                                    <input id="altconf_senha" type="password" class="form-control" name="altconf_senha" title="As senha devem ser iguais">
                                    <?php echo $msg_senha_conf ?>
                                </div>
                            </div>
                            <div class="col-0">
                                <label class="col-form-label">
                                    <span class="material-icons senha_altconf_icon" style="position: absolute; right: 15px; cursor: pointer;">
                                        visibility
                                    </span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Enviar</button>
                        
                    </form>
                    <div class="card-footer text-muted">
                        <a href="<?php echo $index ?>" class="btn btn-success btn-link">
                            <span class="material-icons">
                                reply
                            </span>
                            Voltar para Login
                        <a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }; ?>
<?php altera_senha(); ?>