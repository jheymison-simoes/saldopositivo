<?php
	/**
	 * Página Edita Tipos de Despesas
	 */

	/**
	 * Está página é onde o usuário Edita algum tipo de despesa selecionado
	 * @package pages/tipodespesas
	 * 
	 * @return void
	 */
	function edita_tipo_despesas(){
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

	// Retorna o ID do tipo de Ganho do Banco de Dados
	$id_tipo_despesas = $_GET['id'];

	$sql = "SELECT * FROM tipos_de_despesas WHERE id = {$id_tipo_despesas}";
	$sel = $conecta_bd -> query($sql);
	$tipos = $sel -> fetch_assoc();
?>

<form method="post" action="services/tipodespesas/edita_tipo_despesas.php">
	<div class="row">
		<div class="col-sm-3">
			<div class="input-group dates">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">event_note</i>
					</span>
				</div>
				<label for="tipo_despesa" class="bmd-label-floating" style="
				padding-left: 55px;">Tipo de Depesa*</label>
				<input type="hidden" name="id" id="id" value="<?php echo $id_tipo_despesas ?>">
				<input id="tipo_despesa" type="text"  class="form-control" name="tipo_despesa" value="<?php echo $tipos['tipo_despesa']?>">
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
			<a href="main.php?sec=tipo_despesas">
				<button type="button" class="btn btn-success">
				  	<i class="material-icons">cancel</i> Cancelar
				</button>
			</a>
		</div>
	</div>
</form>
<?php }; ?>
<?php edita_tipo_despesas(); ?>