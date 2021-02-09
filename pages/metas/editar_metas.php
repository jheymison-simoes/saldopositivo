<?php
	/**
	 * Página Cadastrar Metas
	 */

	/**
	 * Está página é onde o usuário edita suas metas e objetivos
	 * @package pages/metas
	 * 
	 * @return void
	 */
	function editar_metas(){
?>
<?php

    /**
     * Esta tela contém o formulário para cadastro de Metas e Objetivos
     * 
     */

    include("bd/conecta_bd.php"); // Importando Conecção com o BD
    include("routes/links.php"); // Importando Links
    include("assets/validations/validate_metas.php"); //Importando validação de Erro

    // Validação de Erro
    if (isset($_GET['erro_alterar']) ) {
		$erro_alterar = $_GET['erro_alterar'];
		// Sucesso - Todos os requisitos foram aceitos
		if ($erro_alterar == 'warnning') {
			echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					  <strong>AVISO</strong> Campos em branco!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		}
    }
    
    // Pega o nome do usuário
    $id_usuario = $_SESSION['user']['id'];

    $id = $_GET['id'];

    $sql_metas = "SELECT * FROM cadastrar_metas WHERE id = '$id'";
    $sel_metas = $conecta_bd->query($sql_metas);
    $metas = $sel_metas -> fetch_assoc();

    $tipo = $metas['tipo_meta'];
    $descricao = $metas['descricao'];
    $valor = $metas['valor_meta'];
    
?>



<!-- Inicio do Formulário -->
<form method="post" action="<?php echo $serv_edita_metas ?>" >
<div class="container">
    <div class="row">

        <!-- Escolhe o tipo de Meta - Select -->
        <label class="col-0 col-form-label" style="color: #495057;">
            <span class="material-icons">
                category
            </span>
        </label>
        <div class="col-3">
            <div class="form-group dropdown bootstrap-select form-control form-control-sm dropup ">
                <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1 bandeira" name="tipo_meta">
                    <option>Tipo Aquisição</option>
                    <option value="Carro" <?=($tipo == "Carro")?'selected':''?> >Carro</option>
                    <option value="Moto" <?=($tipo == "Moto")?'selected':''?> >Moto</option>
                    <option value="Casa" <?=($tipo == "Casa")?'selected':''?> >Casa</option>
                    <option value="Video-Game" <?=($tipo == "Video-Game")?'selected':''?> >Video-Game</option>
                    <option value="PC" <?=($tipo == "PC")?'selected':''?> >PC</option>
                    <option value="Lancha" <?=($tipo == "Lancha")?'selected':''?> >Lancha</option>
                    <option value="Viagem" <?=($tipo == "Viagem")?'selected':''?> >Viagem</option>
                    <option value="Construcao" <?=($tipo == "Construcao")?'selected':''?> >Construção</option>
                    <option value="Poupança" <?=($tipo == "Poupança")?'selected':''?> >Poupança</option>
                    <option value="Outros" <?=($tipo == "Outros")?'selected':''?> >Outros</option>         
                </select>
            </div>
        </div>

        <!-- Descrição da Emta ou Objetivo á ser alcançado -->
        <label class="col-0 col-form-label" style="color: #495057;">
            <span class="material-icons">
                assignment_turned_in
            </span>
        </label>
        <div class="col-5">
            <div class="form-group bmd-form-group text-left">
                <label for="descricao" class="bmd-label-floating">Sua Meta ou Objetivo a alcançar?</label>
                <input id="descricao" type="text" class="form-control" name="descricao" value="<?php echo $descricao ?>">
            </div>
        </div>

        <!-- Limite Disponivel do Cartão -->
        <label class="col-0 col-form-label" style="color: #495057;">
            <span class="material-icons">
                attach_money
            </span>
        </label>
        <div class="col-2">
            <div class="form-group bmd-form-group text-left">
                <label for="valor_meta" class="bmd-label-floating">Valor Total</label>
                <input id="valor_meta" type="number" step="0.010" class="form-control" name="valor_meta" value="<?php echo $valor ?>" >
            </div>
        </div>
    </div>

    <!-- Inicio - Botões Salvar e Cancelar -->
    <div class="row" style="margin-top: 10px; margin-left: 15px;">
        <!-- Botão Salvar
            - ao clicar em salvar ele pegará os dados inseridos e selecionados
            e adicionárá ao Banco de dados
        -->
        <input hidden value="<?php echo $id_usuario ?>" name="id_usuario">
        <input hidden value="<?php echo $id ?>" name="id">
        <div class="col-sm-0">
            <button type="submit" class="btn btn-primary btn-success">
                <i class="material-icons">save</i> Salvar
            </button>
        </div>

        <!-- Botão Cancelar 
            - Ao clicar no botão cancelar ele retornará a página inicial Dashboard
        -->
        <div class="col-sm-0">
            <a href="<?php echo $page_cadastrar_metas ?>">
                <button type="button" class="btn btn-success">
                    <i class="material-icons">cancel</i> Cancelar
                </button>
            </a>
        </div>
    </div>
</div>
</form>

<!-- Esta div seve apenas para aparecer a borda que fica entre o formulário 
    e a tabela que mostrará os ultimos ganhos	
-->
<div id="espacoForm">

</div>
<?php }; ?>
<?php editar_metas(); ?>