<?php
	/**
	 * Página Editar Perfil
	 */

	/**
	 * Está página é onde o usuário pode editar seu perfil
	 * @package pages/perfil
	 * 
	 * @return void
	 */
	function editar_perfil(){
?>

<?php
    /**
     * Esta pagina permite que o usuário edite seu perfil
     */

    include("bd/conecta_bd.php"); // Importando Conecção com o BD
    include("routes/links.php"); // Importando Links
    include("assets/validations/validate_cartoes.php");

    // Pegar dados do usuário
    $id_usuario = $_SESSION['user']['id'];
    $nome_usuario = $_SESSION['user']['nome'];
    $email_usuario = $_SESSION['user']['email'];

    // Pegar dados do perfil
    $sql_perfil = "SELECT * FROM perfil_usuarios WHERE id_cadastrar_usuarios = '$id_usuario'";
    $sel_perfil = $conecta_bd->query($sql_perfil);
    $perfil = $sel_perfil -> fetch_assoc();

    // Valores
    $empresa = $perfil['empresa'];
    $profissao = $perfil['profissao'];
    $sobre = $perfil['sobre'];
    $imagem = $perfil['imagem'];
?>

<form method="post" action="services/perfil/edita_perfil.php" enctype="multipart/form-data">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="fileinput fileinput-new text-center " data-provides="fileinput">
                        
                        <div class="fileinput-new thumbnail img-circle img-raised" style="max-width: 60%;">
                            <img src="<?php echo $imagem ?>" rel="nofollow" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised " style="max-width: 200px;"></div>
                        
                        <div class="card-body">                       
                            <div>
                                <span class="btn btn-raised btn-round btn-success btn-file">
                                    <span class="fileinput-new">Editar image</span>
                                    <span class="fileinput-exists">Outro</span>
                                    <input type="file" name="imagem_perfil">
                                </span>
                                <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Remover</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Seu Perfil</h4>
                        <p class="card-category">Complete seu Perfil</p>
                    </div>
                    <div class="card-body">

                        <div class="row" style="margin-top: 15px;">
                            <!-- Nome e Sobrenome -->
                            <label class="col-1 col-form-label" style="color: #495057;">
                                <span class="material-icons">
                                    person_pin
                                </span>
                            </label>
                            <div class="col-10">
                                <div class="form-group bmd-form-group text-left disabled">
                                    <label for="nome" class="bmd-label-floating">Nome e Sobrenome</label>
                                    <input id="nome" type="text" class="form-control" name="nome" value="<?php echo $nome_usuario ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Email -->
                            <label class="col-1 col-form-label" style="color: #495057;">
                                <span class="material-icons">
                                    mail
                                </span>
                            </label>
                            <div class="col-10">
                                <div class="form-group bmd-form-group text-left disabled">
                                    <label for="email" class="bmd-label-floating">Email</label>
                                    <input id="email" type="text" class="form-control" name="email" value="<?php echo $email_usuario ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Empresa -->
                            <label class="col-1 col-form-label" style="color: #495057;">
                                <span class="material-icons">
                                    work
                                </span>
                            </label>
                            <div class="col-10">
                                <div class="form-group bmd-form-group text-left">
                                    <label for="empresa" class="bmd-label-floating">Empresa</label>
                                    <input id="empresa" type="text" class="form-control" name="empresa" value="<?php echo $empresa ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Profissão -->
                            <label class="col-1 col-form-label" style="color: #495057;">
                                <span class="material-icons">
                                    engineering
                                </span>
                            </label>
                            <div class="col-10">
                                <div class="form-group bmd-form-group text-left">
                                    <label for="profissao" class="bmd-label-floating">Profissao</label>
                                    <input id="profissao" type="text" class="form-control" name="profissao" value="<?php echo $empresa ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Profissão -->
                            <label class="col-1 col-form-label" style="color: #495057;">
                                <span class="material-icons">
                                    description
                                </span>
                            </label>
                            <div class="col-10">
                                <div class="form-group bmd-form-group text-left">
                                    <label for="sobre" class="bmd-label-floating">Sobre</label>
                                    <textarea class="form-control" id="sobre" rows="3" name="sobre"><?php echo $sobre ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <!-- Botão Salvar
                                    - ao clicar em salvar ele pegará os dados inseridos e selecionados
                                    e adicionárá ao Banco de dados
                                -->
                                <input hidden value="<?php echo $id_usuario ?>" name="id_usuario">
                                <button type="submit" class="btn btn-primary btn-success">
                                    <i class="material-icons">save</i> Salvar
                                </button>
                                
                                <!-- Botão Cancelar 
                                    - Ao clicar no botão cancelar ele retornará a página inicial Dashboard
                                -->
                                <a href="main.php?page=perfil&sec=vizualizar_perfil">
                                    <button type="button" class="btn btn-success">
                                        <i class="material-icons">cancel</i> Cancelar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php }; ?>
<?php editar_perfil(); ?>

