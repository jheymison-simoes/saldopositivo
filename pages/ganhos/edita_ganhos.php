<?php
	/**
	 * Página Editar Ganhos
	 */

	/**
	 * Está página é onde o usuário edita seus ganhos
	 * @package pages/ganhos
	 * 
	 * @return void
	 */
	function editar_ganhos(){
?>
<?php

	// Conectando banco de dadoos
	include("bd/conecta_bd.php");

	// Importando Links
	include("routes/links.php");

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

	$id = $_GET['id'];

	$sql = "SELECT * FROM cadastrar_ganhos WHERE id = {$id}";
	$sel = $conecta_bd -> query($sql);
	$ganhos = $sel -> fetch_assoc();

	// Formatando a data para o Padrão Portugues
	$date = $ganhos['data'];
	$data = implode('/', array_reverse(explode('-', $date)));


	// Pega o Tipo de Renda para retornar no Select
	$pega_tipo_renda = "SELECT tipo_renda FROM cadastrar_ganhos WHERE id = '$id'";
	$tipo_renda = $conecta_bd->query($pega_tipo_renda); // Roda SQL
	$tipo = $tipo_renda->fetch_assoc();

	foreach($tipo as $tipo){
		$result = $tipo;
	}
?>




<!-- Inicio - Formulário -->
<form method="post" action="<?php echo $serv_edita_ganhos ?>">
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
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<input id="data" type="text"  class="form-control" name="data" value="<?php echo $data ?>">
				
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
				<input type="text" class="form-control" id="descricao_renda" name="descricao_renda" value="<?php echo $ganhos['descricao'] ?>">
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

	                <?php
								
						// Seleciona a tabela cadastrar_ganhos
						$sql_tipo_ganhos = "SELECT * FROM tipos_de_ganhos ORDER BY tipo_ganho ASC";
						$sel = $conecta_bd->query($sql_tipo_ganhos);
                	?>

		            <?php while ( $tipos = $sel->fetch_assoc() ) : ?>
		                <option value="<?php echo $tipos['tipo_ganho'] ?>" <?=($tipos['tipo_ganho'] == $result)?'selected':''?>><?php echo $tipos['tipo_ganho'] ?></option>
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
				<input type="text" class="form-control" id="valor_renda" name="valor_renda" value="<?php echo number_format($ganhos['valor'],'2',',','.') ?>">
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
			        <input class="form-check-input" type="checkbox" <?=($ganhos['renda_fixa'] == "Sim")?'checked="checked"':''?> value="Sim" name="renda_fixa">
			        Renda Fixa?
			        
			        <span class="form-check-sign" value="Sim" name="renda_fixa" >
			            <span class="check" name="renda_fixa"  ></span>
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
		<div class="col-sm-0">
			<button type="submit" class="btn btn-primary btn-success">
			  	<i class="material-icons">save</i> Salvar
			</button>
		</div>

		<!-- Botão Cancelar 
			 - Ao clicar no botão cancelar ele retornará a página inicial Dashboard
		-->
		<div class="col-sm-0">
			<a href="<?php echo $page_cadastrar_ganho ?>">
				<button type="button" class="btn btn-success">
				  	<i class="material-icons">cancel</i> Cancelar
				</button>
			</a>
		</div>
	</div>
</form>
<?php }; ?>
<?php editar_ganhos(); ?>