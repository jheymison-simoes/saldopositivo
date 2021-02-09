<?php
	/**
	 * Página Cadastrar Ganhos
	 */

	/**
	 * Está página é onde o usuário cadastra seus ganhos
	 * @package pages/ganhos
	 * 
	 * @return void
	 */
	function cadastrar_ganhos(){
?>
<?php

	// Pega o nome do usuário
    $id_usuario = $_SESSION['user']['id'];
	$id_admin = 100;

	// Conecção do Banco de Dados
	include("bd/conecta_bd.php");

	// Importando Links
	include("routes/links.php");

	// Validação de Erros
	include("assets/validations/validate_ganhos.php");

	$data = date('Y-m-d');

	// Seleciona a tabela cadastrar_ganhos
	$sql_tipo_ganhos = "SELECT * FROM tipos_de_ganhos WHERE id_cadastrar_usuarios = '$id_usuario' OR id_cadastrar_usuarios = '$id_admin' ORDER BY tipo_ganho ASC";
	$sel = $conecta_bd->query($sql_tipo_ganhos);
	
?>

<!-- Inicio - Formulário -->
<form method="post" action="<?php echo $serv_cadastra_ganhos ?>">

	<!-- Linha para data e descrição da Renda -->
	<div class="row linha1">
		<!-- Inicio - Input que recebe a data
			 - Por padrão a data será o dia atual, porem o usuário poderá
			   inserir qualquer data que desejar digitando ou utilizando o 
			   calendário que irá aparecer assim que clicar no input
		 -->
		<div class="col-sm-3">
			<div class="input-group dates">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">event_note</i>
					</span>
				</div>
				<label for="data" class="bmd-label-floating" style="
				padding-left: 55px;">Data *</label>
				
				<input id="data" type="date" class="form-control" name="data" value="<?php echo $data ?>">
				
			</div>
		</div>
		<!-- Fim - Input Data -->

		<!-- Inicio - Input Descrição da Renda
			 - O usuário poderá adicionar a descriçãod a renda
			 		Ex: Meu salário do mês
		 -->
		<div class="col-sm-8">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">description</i>
					</span>
				</div>
				<label for="descricao_renda" class="bmd-label-floating" style="
				padding-left: 55px;">Descrição da Renda *</label>
				<input type="text" class="form-control" id="descricao_renda" name="descricao_renda">
			</div>
		</div>
		<!-- Fim - Input Descrição da Renda -->
	</div>

	<!-- Linha para tipo de renda, valor recebido e se a renda é fiza ou não -->
	<div class="row linha2" style="margin-top: 30px; margin-left: 15px;">

		<!-- Inicio - Select Tipo de Renda
			 - O usuário irá escolher entre os tipos disponiveis,
			   porem caso não tiver o tipo que ele deseja pode cadastrar um novo
			   clicando no link de cadastrar um novo tipo
		 -->
		<div class="col-sm-0" >
			<span class="input-group-text">
				<i class="material-icons">category</i>
			</span>
		</div>	
		<div class="col-sm-4">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1 tipo_renda" name="tipo_renda">

              		<!-- Retorna do Banco de Dados os Tipos de Ganhos -->

	                <option>Tipo de Renda *</option>

		            <?php while ( $tipos = $sel->fetch_assoc() ) : ?>
		                <option value="<?php echo $tipos['tipo_ganho'] ?>"><?php echo $tipos['tipo_ganho'] ?></option>
		            <?php endwhile; ?>
	                
            	</select>
      		</div>
		</div>
		<!-- Fim -- Select tipo de Renda -->
		
		<!-- Incio - Input Valor Recebido
			 - Esse input deve´ra ser inserido o valor recebido da renda
		 -->
		<div class="col-sm-4">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">attach_money</i>
					</span>
				</div>
				<label for="valor_renda" class="bmd-label-floating" style="
				padding-left: 55px;">Valor Recebido R$ 0,00*</label>
				<input type="number" step="0.010" class="form-control" id="valor_renda" name="valor_renda">
			</div>
		</div>
		<!-- Fim - Input Valor Recebido -->

		<!-- Incio - Checkbox de Renda Fixa sim ou não 
			 - Caso selecionado será sim, assim será compudado este valor
			   mensalmente até que o usuário edite ou exclua este item
		-->
		<div class="col-sm-2" style="margin-top: 10px;">
			<div class="form-check">
			    <label class="form-check-label">
			        <input class="form-check-input" type="checkbox" value="Sim" name="renda_fixa">
			        Renda Fixa?
			        <span class="form-check-sign" value="Sim" name="renda_fixa">
			            <span class="check" name="renda_fixa"></span>
			        </span>
			    </label>
			</div>
		</div>
		<!-- Fim - Checkbox Renda Fixa -->
	</div>

	<!-- Inicio - Botões Salvar e Cancelar -->
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

<!-- Esta div seve apenas para aparecer a borda que fica entre o formulário 
		e a tabela que mostrará os ultimos ganhos	
-->
<div id="espacoForm">
	
</div>
<!-- Fim espaço -->


<!-- Tabela de Ganhos com paginação -->
<?php
	include("inserts/table_ganhos.php");
?>
<?php }; ?>
<?php cadastrar_ganhos(); ?>