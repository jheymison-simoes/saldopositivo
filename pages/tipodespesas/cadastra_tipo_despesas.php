<?php
	/**
	 * Página Cadastra Tipos de Despesas
	 */

	/**
	 * Está página é onde o usuário Cadastra os tipos de despesas Ex.: cinema, futebol, cerveja
	 * @package pages/tipodespesas
	 * 
	 * @return void
	 */
	function cadastra_tipo_despesas(){
?>

 <?php
	// Retorna do banco de dados os ultimos ganhos adicionados para exibir na tabela
	include("bd/conecta_bd.php");

	// importando Links
	include("routes/links.php");

	// Validação de Erros
	include("assets/validations/validate_tipo_despesas.php");

	// Pega o nome do usuário
    $id_usuario = $_SESSION['user']['id'];
	
	
?>

<form method="post" action="<?php echo $serv_cadastra_tipo_despesas ?>">
	<div class="row">
		<div class="col-sm-3">
			<div class="input-group dates">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">event_note</i>
					</span>
				</div>
				<label for="tipo_despesa" class="bmd-label-floating" style="
				padding-left: 55px;">Tipo de Despesas *</label>
				<input id="tipo_despesa" type="text"  class="form-control" name="tipo_despesa">
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
			<button type="submit" class="btn btn-primary btn-success" name="salvar">
			  	<i class="material-icons">save</i> Salvar
			</button>
		</div>

		<!-- Botão Cancelar 
			 - Ao clicar no botão cancelar ele retornará a página inicial Dashboard
		-->
		<div class="col-sm-0">
			<a class="btn btn-success" href="<?php echo $main ?>" name="cancelar">	
				<i class="material-icons">cancel</i> Cancelar
			</a>
		</div>
	</div>
</form>

<div id="espacoForm">
	
</div>

<?php
	include("inserts/table_tipo_despesas.php");
?>

<?php }; ?>
<?php cadastra_tipo_despesas(); ?>