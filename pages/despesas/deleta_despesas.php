<?php
	/**
	 * Página Deletar Despesa
	 */

	/**
	 * Está página é onde o usuário deleta suas despesas
	 * @package pages/despesas
	 * 
	 * @return void
	 */
	function deletar_despesas(){
?>
<?php
	include("routes/links.php");
	$id = $_GET['id']; // pega o valor de ID da URL
?>

<form method="post" action="<?php echo $serv_deleta_despesas ?>">
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
			<a href="<?php echo $page_cadastrar_despesa ?>">
				<button type="button" class="btn btn-success">
				  	<i class="material-icons">cancel</i> Não
				</button>
			</a>
		</div>
	</div>
</form>
<?php }; ?>
<?php deletar_despesas(); ?>


