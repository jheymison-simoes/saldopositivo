<?php
	/**
	 * Página Cadastrar Despesa
	 */

	/**
	 * Está página é onde o usuário cadastra suas despesas
	 * @package pages/despesas
	 * 
	 * @return void
	 */
	function cadastrar_despesas(){
?>

<?php
	// Conecção do Banco de Dados
	include("bd/conecta_bd.php");

	// Validação de Erros
	include("assets/validations/validate_despesas.php");

	// Importação de links
	include("routes/links.php");

	$data = date('Y-m-d');

	// Pega o nome do usuário
    $id_usuario = $_SESSION['user']['id'];

	// Seleciona a tabela cadastrar_ganhos
	$sql_tipo_despesas = "SELECT * FROM tipos_de_despesas ORDER BY tipo_despesa ASC";
	$sel_tipo_despesas = $conecta_bd->query($sql_tipo_despesas);

	// Seleciona a tabela cadastrar_cartoes
	$sql_cartoes = "SELECT * FROM cadastrar_cartoes ORDER BY titulo ASC";
	$sel_cartoes = $conecta_bd->query($sql_cartoes);

	// Seleciona a tabela cadastrar_cartoes
	$sql_cartoes_p = "SELECT * FROM cadastrar_cartoes ORDER BY titulo ASC";
	$sel_cartoes_p = $conecta_bd->query($sql_cartoes_p);

?>

<!-- Inicio - Formulário -->
<form method="post" action="<?php echo $serv_cadastra_despesa ?>">

	<!-- Linha para data e descrição da Despesa -->
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
				
				<input id="data" type="date"  class="form-control" name="data" value="<?php echo $data ?>">
			</div>
		</div>
		<!-- Fim - Input Data -->

		<!-- Inicio - Input Descrição da Despesa
			 - O usuário poderá adicionar a descrição da Despesa
			 		Ex: Futebol com os amigos
		 -->
		<div class="col-sm-8">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">description</i>
					</span>
				</div>
				<label for="descricao_despesa" class="bmd-label-floating" style="
				padding-left: 55px;">Descrição da Despesa *</label>
				<input type="text" class="form-control" id="descricao_despesa" name="descricao_despesa">
			</div>
		</div>
		<!-- Fim - Input Descrição da Despesa -->
	</div>

	<!-- Linha para tipo de Despesa, valor recebido e se a Despesa é fixa ou não -->
	<div class="row linha2" style="margin-top: 30px; margin-left: 15px;">

		<!-- Inicio - Select Tipo de Despesa
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
              	<select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1 tipo_despesa" name="tipo_despesa">

              		<!-- Retorna do Banco de Dados os Tipos de Despesas -->

	                <option>Tipo de Despesa *</option>

		            <?php while ( $tipos = $sel_tipo_despesas->fetch_assoc() ) : ?>
		                <option value="<?php echo $tipos['tipo_despesa'] ?>"><?php echo $tipos['tipo_despesa'] ?></option>
		            <?php endwhile; ?>
	                
            	</select>
      		</div>
		</div>
		<!-- Fim -- Select tipo de Despesa -->
		
		<!-- Incio - Select Tipo de Pagamento -->
			<div class="col-sm-0" >
				<span class="input-group-text">
					<i class="material-icons">shop</i>
				</span>
			</div>	
			<div class="col-sm-4">
				<div class="dropdown bootstrap-select form-control form-control-sm dropup" name="select_tipo_de_Pagamento">
              		<select id="tipo_pagamento" class="form-control selectpicker" id="exampleFormControlSelect1" data-style="btn btn-link" name="tipo_pagamento">
		                <option>Tipo de Pagamento*</option>
		                <option value="a_vista">A Vista</option>
		                <option value="parcelado">Parcelado</option>
	            	</select>
	      		</div>
			</div>
		<!-- Fim - Select Tipo Pagamento -->

		<!-- Incio - Checkbox de Despesa Fixa sim ou não 
			 - Caso selecionado será sim, assim será compudado este valor
			   mensalmente até que o usuário edite ou exclua este item
		-->
		<div class="col-sm-3" style="margin-top: 10px;">
			<div id="despesa_fixa"  class="form-check">
			    <label class="form-check-label">
			        <input class="form-check-input" type="checkbox" value="Sim" name="despesa_fixa">
			        	Despesa Fixa?
			        <span class="form-check-sign" value="Sim" name="despesa_fixa">
			            <span class="check" name="despesa_fixa"></span>
			        </span>
			    </label>
			</div>
		</div>
		<!-- Fim - Checkbox Despesa Fixa -->
	</div>

	<!-- Inicio - Linha para pagamento á vista -->
	<div class="row" id="mostra_linha_vista" style="margin-top: 25px; margin-left: 15px; display: none;">
		<div class="col-sm-0" >
			<span class="input-group-text">
				<i class="material-icons">attach_money</i>
			</span>
		</div>	
		<div class="col-sm-4">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select id="forma_pagamento_vista" class="form-control selectpicker" data-style="btn btn-link"  name="forma_pagamento_vista">
	                <option value="">Forma de Pagamento *</option>
	                <option value="dinheiro_vista">Dinheiro</option>
	                <option value="cartao_vista">Cartão</option>
	                <option value="transferencia_vista">Transferência</option>
	                <option value="deposito_vista">Depósito</option>
            	</select>
      		</div>
		</div>
		
		<div id="mostra_icone_vista" class="col-sm-0" style="display: none;">
			<span class="input-group-text">
				<i class="material-icons">payment</i>
			</span>
		</div>	
		<div id="mostra_cartao_vista" class="col-sm-4" style="display: none;">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select class="form-control selectpicker" data-style="btn btn-link" id="cartao_pagamento_vista" name="cartao_pagamento_vista">
	                <option value="">Cartão Utilizado *</option>
	                <!-- Retorna os Cartões Cadastrados do Banco de Dados -->
		            <?php while ( $cartoes = $sel_cartoes->fetch_assoc() ) : ?>
		                <option value="<?php echo $cartoes['id'] ?>"><?php echo $cartoes['titulo'] ?></option>
		            <?php endwhile; ?>
            	</select>
      		</div>
		</div>

		<div class="col-sm-3">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">monetization_on</i>
					</span>
				</div>
				<label for="valor_despesa" class="bmd-label-floating" style="
				padding-left: 55px;">Valor R$ 0,00*</label>
				<input type="text" class="form-control" id="valor_despesa" name="valor_despesa">
			</div>
		</div>
	</div>
	<!-- Fim - Linha pagamento á vista -->

	<!-- Linha para Pagamento Parcelado -->
	<div id="mostra_linha_parcelado" class="row" style="margin-top: 25px; margin-left: 15px; display: none;">
		<div class="col-sm-0" >
			<span class="input-group-text">
				<i class="material-icons">attach_money</i>
			</span>
		</div>	
		<div class="col-sm-5">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select id="forma_pagamento_parcelado" class="form-control selectpicker" data-style="btn btn-link"  name="forma_pagamento_parcelado">
	                <option value="tipo">Forma de Pagamento *</option>
	                <option value="cartao_parcelado">Cartão de Crédito</option>
	                <option value="boleto_parcelado">Boleto Bancário</option>
	                <option value="promissoria_parcelado">Notinha Promissória</option>
	                <option value="confianca_parcelado">Confiança</option>
            	</select>
      		</div>
		</div>

		<div id="mostra_icone_parcelado" class="col-sm-0" style="display: none;">
			<span class="input-group-text">
				<i class="material-icons">payment</i>
			</span>
		</div>	
		<div id="mostra_cartao_parcelado" class="col-sm-5" style="display: none;">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select class="form-control selectpicker" data-style="btn btn-link" id="cartao_pagamento_parcelado" name="cartao_pagamento_parcelado">
	                <option value="">Cartão Utilizado *</option>

	                <!-- Retorna os Cartões Cadastrados do Banco de Dados -->
		            <?php while ( $cartoes = $sel_cartoes_p->fetch_assoc() ) : ?>
		                <option value="<?php echo $cartoes['id'] ?>"><?php echo $cartoes['titulo'] ?></option>
		            <?php endwhile; ?>

            	</select>
      		</div>
		</div>	
	</div>

	<div id="linha_parcelas_valor" class="row" style="margin-top: 25px; display: none;">
		<div class="col-sm-5">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">monetization_on</i>
					</span>
				</div>
				<label for="qnt_parcelas" class="bmd-label-floating" style="
				padding-left: 55px;">Qnt Parcelas*</label>
				<input type="number" class="form-control" id="qnt_parcelas" name="qnt_parcelas">
			</div>
		</div>

		<div class="col-sm-5" style="margin-left: 15px;">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">monetization_on</i>
					</span>
				</div>
				<label for="valor_parcelas" class="bmd-label-floating" style="
				padding-left: 55px;">Valor Parcela R$ 0,00*</label>
				<input type="text" class="form-control" id="valor_parcelas" name="valor_parcelas">
			</div>
		</div>
	</div>

	<!-- Inicio - Botões Salvar e Cancelar -->
	<div class="row" style="margin-top: 15px; margin-left: 15px;">

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
	include("inserts/table_despesas.php");
?>

<?php }; ?>
<?php cadastrar_despesas(); ?>
