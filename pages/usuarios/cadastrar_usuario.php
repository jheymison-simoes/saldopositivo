
<?php 
    /**
     * Cadastro do usuário 
     * 
     */


    /**
     * Cadastro do Usuário
     * 
     * Esta função é a pagina front end do cadastrar usuário, é nela que o usuário realiza o cadastro para entrar no site!
     * @package pages/usuarios
     * 
     * @return void
     */
    function cadastra_usuario() { 
        include("assets/validations/validate_cadastra_usuario.php");
        // Importando Links
        include_once("routes/links.php");
    ?>
        
    <form method="post" action="<?php echo $serv_cadastra_usuario ?>" >
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
                        <img src="assets/img/logo_login.png" width="200">
                    </div>

                    <div id="card_header" class="card-header card-header-success">
                        <span id="titulo_login">CADASTRE-SE</span>
                        <?php echo $msg_failed ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-1 col-form-label">
                                <span class="material-icons">
                                    perm_identity
                                </span>
                            </label>
                            <div class="col">
                                <div class="form-group bmd-form-group text-left">
                                    <label for="nome_cadastrar" class="bmd-label-floating">Seu Nome e Sobrenome</label>
                                    <input id="nome_cadastrar" type="text" class="form-control" name="nome_cadastrar" >
                                    <?php echo $msg_name; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-1 col-form-label">
                                <span class="material-icons">
                                    mail
                                </span>
                            </label>
                            <div class="col">
                                <div class="form-group bmd-form-group text-left">
                                    <label for="email_cadastrar" class="bmd-label-floating">Informe seu E-mail</label>
                                    <input id="email_cadastrar" type="text" class="form-control" name="email_cadastrar" >
                                    <?php echo $msg_email; ?>
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
                                    <label for="senha_cadastrar" class="bmd-label-floating">Insira uma Senha</label>
                                    <input id="senha_cadastrar" type="password" class="form-control d-inline" name="senha_cadastrar" title="A senha deve conter ao menos 01 letra Maiuscula, 01 letra Minuscula, 01 Numero e pelo menos 06 Caracteres!">
                                    <?php echo $msg_senha; ?>
                                </div>
                            </div>
                            <div class="col-0">
                                <label class="col-form-label">
                                    <span class="material-icons senha_cadastrar_icon" style="position: absolute; right: 15px; cursor: pointer; ">
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
                                    <label for="conf_senha" class="bmd-label-floating">Insira Novamente a Senha</label>
                                    <input id="conf_senha" type="password" class="form-control" name="conf_senha" title="As senha devem ser iguais">
                                    <?php echo $msg_senha_conf; ?>
                                </div>
                            </div>
                            <div class="col-0">
                                <label class="col-form-label">
                                    <span class="material-icons senha_conf_icon" style="position: absolute; right: 15px; cursor: pointer;">
                                        visibility
                                    </span>
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-success" >CADASTRAR</button> 
                    </div>
                    OU
                    <a href="<?php echo $index ?>" class="btn btn-info btn-link" name="login">
                        FAÇA LOGIN
                    </a>
                </div> 
            </div>
        </div>
    </form>
<?php }; // Termino da função?> 

<!-- Chamando a função -->
<?php cadastra_usuario() ?>