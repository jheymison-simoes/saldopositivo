<?php 
    /**
     * Pagina Front end Login
     * @author Nayara <naiara.santos@live.com>
     * @package pages/usuarios
     */

     /**
      * Esta função realiza o login do usuário ela é a pagina que vai aparecer primeiro
      *
      * @return void
      */
function login() { 
    //  Validação de Erros
    include("assets/validations/validate_login.php");

    // Importando Links
    include_once("routes/links.php");
?>
<form method="post" action="<?php echo $realiza_login ?>">
    <div class="row">
        <div id="img_back_login" class="col-lg-7" style="background-image: url('assets/img/background_login.png'); background-repeat: no-repeat; background-size: 100%; background-position: center;">
            <div id="efeito" class="row">
                <div id="texto_login" class="col-lg-8 text-left texto_login">
                    Sua Vida Mais Positiva com SALDO POSITIVO, Evite Ficar No VERMELHO, e Fique Sempre no AZUL! 
                    Entre ou Cadastre-se!
                </div>
            </div>
        </div>
        <div id="form_login" class="col-sm-5" style="background-image: url('assets/img/fundo_login2.png'); background-repeat: no-repeat; background-size: 100%; background-position: center;">

            <div id="card_login" class="card card-nav-tabs text-center col-sm-10">
                <div id="logo_login" class="container">
                    <img src="assets/img/logo_LOGIN.png" width="200">
                </div>

                <div id="card_header" class="card-header card-header-success">
                    <span id="titulo_login">LOGIN</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-1 col-form-label">
                            <span class="material-icons">
                                mail
                            </span>
                        </label>
                        <div class="col">
                            <div class="form-group bmd-form-group text-left">
                                <label for="email_logar" class="bmd-label-floating">E-mail ou Nome de Usuário</label>
                                <input id="email_logar"type="text" class="form-control" name="email_logar">
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
                                <label for="senha_logar" class="bmd-label-floating">Senha</label>
                                <input id="senha_logar" type="password" class="form-control" name="senha_logar">
                                <?php echo $msg_senha ?>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-success">ENTRAR</button> 
                </div>
                OU
                <a href="<?php echo $page_cadastro_usuario ?>" type="submit" class="btn btn-info btn-link" name="cadastrar">
                    CADASTRE-SE
                </a>
                <div id="card_footer" class="card-footer text-muted">
                    <a href="<?php echo $page_esqueceu_senha ?>" class="btn btn-success btn-sm btn-link">
                        <span class="material-icons">
                            notification_important
                        </span>
                        Esqueceu sua Senha?
                    </a>
                </div>
            </div> 
        </div>
    </div>
</form>

<?php } // fim da função ?>

<?php login(); ?>