<?php
	/**
	 * Página Deleta tipos de Ganhos
	 */

	/**
	 * Está página é onde o usuário confirma que quer deletar algum tipo de ganho
	 * @package pages/tipoganhos
	 * 
	 * @return void
	 */
	function deleta_tipo_ganhos(){
?>
<?php
	$id = $_GET['id']; // pega o valor de ID da URL

	// Importando links
	include("routes/links.php");
?>

<form method="post" action="<?php echo $serv_deleta_tipo_ganhos ?>">
	<div class="row d-flex justify-content-center">
		<div class="col d-flex justify-content-center">
			<h3>Voce tem certeza que deseja deletar?</h3>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<!-- Botão Salvar
			 - ao clicar em salvar ele pegará os dados inseridos e selecionados
			   e adicionárá ao Banco de dados
		 -->
		<div class="col-sm-0">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<button type="submit" class="btn btn-primary btn-success" name="sim">
			  	<i class="material-icons">save</i> Sim
			</button>
		</div>

		<!-- Botão Cancelar 
			 - Ao clicar no botão cancelar ele retornará a página inicial Dashboard
		-->
		<div class="col-sm-0">
			<a href="<?php echo $page_cadastra_tipo_ganho ?>">
				<button type="button" class="btn btn-success">
				  	<i class="material-icons">cancel</i> Não
				</button>
			</a>
		</div>
	</div>
</form>
<?php }; ?>
<?php deleta_tipo_ganhos(); ?>


