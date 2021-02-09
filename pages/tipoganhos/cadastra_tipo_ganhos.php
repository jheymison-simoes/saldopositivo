<?php
	/**
	 * Página Cadastrar Tipos de Ganhos
	 */

	/**
	 * Está página é onde o usuário realiza o cadastro de tipos de ganhos ex.: Salario, Hora Extra, Serviço Extra, prêmio
	 * @package pages/tipoganhos
	 * 
	 * @return void
	 */
	function cadastra_tipo_ganhos(){
?>
 <?php
	// Retorna do banco de dados os ultimos ganhos adicionados para exibir na tabela
	include("bd/conecta_bd.php");

	// Importando links
	include("routes/links.php");

	// Validação de Erros
	include("assets/validations/validate_tipo_ganhos.php");

	// Pega o nome do usuário
    $id_usuario = $_SESSION['user']['id'];

?>

<form method="post" action="<?php echo $serv_cadastra_tipo_ganhos ?>">
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
				<input id="tipo_ganho" type="text"  class="form-control" name="tipo_ganho">
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 30px; margin-left: 15px;">
		<!-- Botão Salvar
			 - ao clicar em salvar ele pegará os dados inseridos e selecionados
			   e adicionárá ao Banco de dados
		 -->
		<input hidden value="<?php echo $id_usuario ?>" name="id_usuario">
		<div class="col-sm-0">
			<button type="submit" class="btn btn-primary btn-success">
			  	<i class="material-icons">save</i> Salvar
			</button>
		</div>

		<!-- Botão Cancelar 
			 - Ao clicar no botão cancelar ele retornará a página inicial Dashboard
		-->
		<div class="col-sm-0">
			<a href="<?php echo $main ?>">
				<button type="button" class="btn btn-success">
				  	<i class="material-icons">cancel</i> Cancelar
				</button>
			</a>
		</div>
	</div>
</form>

<div id="espacoForm">
	
</div>


<!-- Tabela -->
<?php
	include("inserts/table_tipo_ganhos.php");
?>

<?php }; ?>
<?php cadastra_tipo_ganhos(); ?>