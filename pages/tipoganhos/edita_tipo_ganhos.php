<?php
	/**
	 * Página Edita tipos de Ganhos
	 */

	/**
	 * Está página é onde o usuário edita algum tipo de ganhos selecionado
	 * @package pages/tipoganhos
	 * 
	 * @return void
	 */
	function edita_tipo_ganhos(){
?>

<!-- Mostra erros -->
<?php
	if (isset($_GET['erro_alterar']) ) {

		$erro_alterar = $_GET['erro_alterar'];

		// Sucesso - Todos os requisitos foram aceitos
		if ($erro_alterar == 'warnning') {
			$msg = 'Filme Adicionado com Sucesso';
			echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					  <strong>AVISO</strong> Campos em branco!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		}

	}
?>

<!-- Conecção e alteração do banco de Dados -->
<?php
	// Conectando banco de dadoos
	include("bd/conecta_bd.php");

	// Importando Links
	include("routes/links.php");

	// Retorna o ID do tipo de Ganho do Banco de Dados
	$id_tipo_ganhos = $_GET['id'];

	$sql = "SELECT * FROM tipos_de_ganhos WHERE id = {$id_tipo_ganhos}";
	$sel = $conecta_bd -> query($sql);
	$tipos = $sel -> fetch_assoc();
?>

<form method="post" action="<?php echo $serv_edita_tipo_ganhos ?>">
	<div class="row">
		<div class="col-sm-3">
			<div class="input-group dates">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">event_note</i>
					</span>
				</div>
				<label for="tipo_ganho" class="bmd-label-floating" style="
				padding-left: 55px;">Tipo de Ganhos*</label>
				<input type="hidden" name="id" id="id" value="<?php echo $id_tipo_ganhos ?>">
				<input id="tipo_ganho" type="text"  class="form-control" name="tipo_ganho" value="<?php echo $tipos['tipo_ganho']?>">
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 30px; margin-left: 15px;">
		<!-- Botão Salvar
			 - ao clicar em salvar ele pegará os dados inseridos e selecionados
			   e adicionárá ao Banco de dados
		 -->

		<div class="col-sm-0">
			<button type="submit" class="btn btn-primary btn-success">
			  	<i class="material-icons">save</i> Alterar
			</button>
		</div>

		<!-- Botão Cancelar 
			 - Ao clicar no botão cancelar ele retornará a página inicial Dashboard
		-->
		<div class="col-sm-0">
			<a class="btn btn-success" href="<?php echo $page_cadastra_tipo_ganho ?>">
				<i class="material-icons">cancel</i> Cancelar
			</a>
		</div>
	</div>
</form>
<?php }; ?>
<?php edita_tipo_ganhos(); ?>