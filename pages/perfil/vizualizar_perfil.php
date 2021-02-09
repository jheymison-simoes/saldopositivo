<?php
	/**
	 * Página Visualizar Perfil
	 */

	/**
	 * Está página é onde o usuário visualiza seu perfil
	 * @package pages/perfil
	 * 
	 * @return void
	 */
	function visualizar_perfil(){
?>

<?php
    /**
     * Esta pagina mostrará ao usuário seu perfil
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


<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="javascript:;">
                        <img class="img" src="<?php echo $imagem ?>">
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-category text-gray"> Profissão: <?php echo $profissao ?></h6>
                    <h4 class="card-title"><?php echo $nome_usuario ?></h4>
                    <p class="card-description">
                        Sobre: <?php echo $sobre ?>
                    </p>
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
                    <form>
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
                            <!-- Nome e Sobrenome -->
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
                            <!-- Nome e Sobrenome -->
                            <label class="col-1 col-form-label" style="color: #495057;">
                                <span class="material-icons">
                                    work
                                </span>
                            </label>
                            <div class="col-10">
                                <div class="form-group bmd-form-group text-left disabled">
                                    <label for="empresa" class="bmd-label-floating">Empresa</label>
                                    <input id="empresa" type="text" class="form-control" name="empresa" value="<?php echo $empresa ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <a href="main.php?page=perfil&sec=editar_perfil" class="btn btn-success">Editar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }; ?>
<?php visualizar_perfil(); ?>

