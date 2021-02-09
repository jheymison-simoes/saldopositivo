<?php
	/**
	 * Página Editar Despesa
	 */

	/**
	 * Está página é onde o usuário edita suas despesas
	 * @package pages/despesas
	 * 
	 * @return void
	 */
	function editar_despesas(){
?>
<?php

	// Conectando banco de dadoos
	include("bd/conecta_bd.php");

	// Inmportando Links
	include("routes/links.php");

	if (isset($_GET['erro']) ) {

		$erro = $_GET['erro'];

		// Sucesso - Todos os requisitos foram aceitos
		if ($erro == 'branco') {
			echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					  <strong>AVISO</strong> Campos em branco!
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					 	  <span aria-hidden='true'>&times;</span>
					  </button>
				  </div>";
		}
	}

	$id = $_GET['id'];

	$sql = "SELECT * FROM cadastrar_despesas WHERE id = {$id}";
	$sel = $conecta_bd -> query($sql);
	$despesas = $sel -> fetch_assoc();

	// Formatando a data para o Padrão Portugues
	$date = $despesas['data'];
	$data = implode('/', array_reverse(explode('-', $date)));


	// Pega o Tipo de Renda para retornar no Select
	$pega_tipo_despesa = "SELECT tipo_despesa FROM cadastrar_despesas WHERE id = '$id'";
	$tipo_despesa = $conecta_bd->query($pega_tipo_despesa); // Roda SQL
	$tipo = $tipo_despesa->fetch_assoc();

	foreach($tipo as $tipo){
		$result = $tipo;
	}


	// Pega valores na tabela de pagamento_a_vista
	$pega_forma_pagamento_a_vista = "SELECT * FROM pagamentos_a_vista WHERE id_cadastrar_despesas = '$id'";
	$sel_forma_pagamento_a_vista = $conecta_bd -> query($pega_forma_pagamento_a_vista);
	$forma_pagamento_a_vista = $sel_forma_pagamento_a_vista -> fetch_assoc();

	// Pega valor e Forma de pagamento a vista
	$forma_a_vista = $forma_pagamento_a_vista['forma_pagamento'];
	$valor_a_vista = $forma_pagamento_a_vista['valor_despesa'];
	$valor_a_vista_format = str_replace('.', ',', $valor_a_vista);

	// Pega valores na tabela cartoes_cadastrados
	$sql_cartoes = "SELECT * FROM cadastrar_cartoes";
	$sel_cartoes = $conecta_bd->query($sql_cartoes);

	// Pega os cartões utilizados na tabela cartoes_avista
	$sql_cartao_utlizado = "SELECT * FROM cartoes_avista WHERE id_cadastrar_despesas = '$id'";
	$sel_cartao_utlizado = $conecta_bd->query($sql_cartao_utlizado);
	$cartao = $sel_cartao_utlizado -> fetch_assoc();

	$cartao_utilizado = $cartao['id_cadastrar_cartoes']; 

	// Pega valores na tabela pagamentos_parcelados
	$pega_forma_pagamento_parcelado = "SELECT * FROM pagamentos_parcelados WHERE id_cadastrar_despesas = '$id'";
	$sel_forma_pagamento_parcelado = $conecta_bd -> query($pega_forma_pagamento_parcelado);
	$forma_pagamento_parcelado = $sel_forma_pagamento_parcelado -> fetch_assoc();

	// Pega valor e Forma de pagamento parcelado
	$forma_parcelado = $forma_pagamento_parcelado['forma_pagamento'];
	$qnt_parcelas = $forma_pagamento_parcelado['qnt_parcelas'];
	$valor_parcela = $despesas['valor_despesa'];

	$valor_parcela_format = str_replace('.', ',', $valor_parcela);

	// Pega valores na tabela cartoes_cadastrados
	$sql_cartoes_p = "SELECT * FROM cadastrar_cartoes";
	$sel_cartoes_p = $conecta_bd->query($sql_cartoes_p);

	// Pega os cartões utilizados na tabela cartoes_parcelados
	$sql_cartao_utlizado_p = "SELECT * FROM cartoes_parcelados WHERE id_cadastrar_despesas = '$id'";
	$sel_cartao_utlizado_p = $conecta_bd->query($sql_cartao_utlizado_p);
	$cartao_parcelado = $sel_cartao_utlizado_p -> fetch_assoc();

	$cartao_utilizado_p = $cartao_parcelado['id_cadastrar_cartoes'];


?>


<!-- Inicio - Formulário -->
<form method="post" action="<?php echo $serv_edita_despesa ?>">

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
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<input id="data" type="text"  class="form-control" name="data" value="<?php echo $data ?>">
				
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
				<input type="text" class="form-control" id="descricao_despesa" name="descricao_despesa" value="<?php echo $despesas['descricao'] ?>">
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
	                <?php	
						// Seleciona a tabela cadastrar_ganhos
						$sql_tipo_despesas = "SELECT * FROM tipos_de_despesas ORDER BY tipo_despesa ASC";
						$sel = $conecta_bd->query($sql_tipo_despesas);
                	?>

		            <?php while ( $tipos = $sel->fetch_assoc() ) : ?>
		                <option value="<?php echo $tipos['tipo_despesa'] ?>" <?=($tipos['tipo_despesa'] == $result)?'selected':''?>><?php echo $tipos['tipo_despesa'] ?></option>
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
				<div class="dropdown bootstrap-select form-control form-control-sm dropup">
              	<select id="tipo_pagamento" class="form-control selectpicker" id="exampleFormControlSelect1" data-style="btn btn-link"   name="tipo_pagamento">
		                <option>Tipo de Pagamento *</option>

	                	<option value="a_vista" <?=($despesas['tipo_pagamento'] == "a_vista")?'selected':''?> >A Vista</option>
	                	<option value="parcelado" <?=($despesas['tipo_pagamento'] == "parcelado")?'selected':''?> >Parcelado</option>

	            	</select>
	      		</div>
			</div>
		<!-- Fim - Select Tipo Pagamento -->

		<!-- Incio - Checkbox de Despesa Fixa sim ou não 
			 - Caso selecionado será sim, assim será compudado este valor
			   mensalmente até que o usuário edite ou exclua este item
		-->
		<div class="col-sm-3" style="margin-top: 10px;">
			<div id="despesa_fixa" class="form-check">
			    <label class="form-check-label">
					<? //=($despesas['despesa_fixa'] == "Sim")?'checked="checked"':''?>
			        <input class="form-check-input" type="checkbox"  value="Sim" name="despesa_fixa">
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
	<?php

		if( $despesas['tipo_pagamento'] == "a_vista" ){
			$mostrar_a_vista = 'flex'; // ativo
			$mostrar_parcelado = 'none'; // inativo
		} else if ( $despesas['tipo_pagamento'] == "parcelado" ) {
			$mostrar_a_vista = 'none'; // inativo
			$mostrar_parcelado = 'flex'; // ativo
		} else {
			$mostrar_a_vista = 'none'; // inativo
			$mostrar_parcelado = 'none'; // inativo
		}

	?>
	<div class="row" id="mostra_linha_vista" style="margin-top: 25px; margin-left: 15px; display: <?php echo $mostrar_a_vista; ?>;">
		<div class="col-sm-0" >
			<span class="input-group-text">
				<i class="material-icons">attach_money</i>
			</span>
		</div>	
		<div class="col-sm-4">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select id="forma_pagamento_vista" class="form-control selectpicker" data-style="btn btn-link"  name="forma_pagamento_vista">
	                <option value="" selected>Forma de Pagamento *</option>
	                <option value="dinheiro_vista" <?=($forma_a_vista == "dinheiro_vista")?'selected':''?>>Dinheiro</option>
	                <option value="cartao_vista" <?=($forma_a_vista == "cartao_vista")?'selected':''?>>Cartão</option>
	                <option value="transferencia_vista" <?=($forma_a_vista == "transferencia_vista")?'selected':''?>>Transferência</option>
	                <option value="deposito_vista" <?=($forma_a_vista == "deposito_vista")?'selected':''?>>Depósito</option>
            	</select>
      		</div>
		</div>
		
		<div id="mostra_icone_vista" class="col-sm-0" style="display: <?=($forma_a_vista == "cartao_vista")?'flex':'none'?>;">
			<span class="input-group-text">
				<i class="material-icons">payment</i>
			</span>
		</div>	
		<div id="mostra_cartao_vista" class="col-sm-4" style="display: <?=($forma_a_vista == "cartao_vista")?'flex':'none'?>;">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select class="form-control selectpicker" data-style="btn btn-link" id="cartao_pagamento_vista" name="cartao_pagamento_vista">
	                <option value="">Cartão Utilizado *</option>

		            <?php while ( $cartoes = $sel_cartoes->fetch_assoc() ) : ?>
		                <option value="<?php echo $cartoes['id'] ?>" <?=($cartoes['id'] == $cartao_utilizado)?'selected':''?>><?php echo $cartoes['titulo'] ?></option>
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
				<input type="text" class="form-control" id="valor_despesa" name="valor_despesa" value="<?php echo $valor_a_vista_format ?>">
			</div>
		</div>
	</div>
	<!-- Fim - Linha pagamento á vista -->

	<!-- Linha para Pagamento Parcelado -->
	<div id="mostra_linha_parcelado" class="row" style="margin-top: 25px; margin-left: 15px; display: <?php echo $mostrar_parcelado; ?>;">
		<div class="col-sm-0" >
			<span class="input-group-text">
				<i class="material-icons">attach_money</i>
			</span>
		</div>	
		<div class="col-sm-5">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select id="forma_pagamento_parcelado" class="form-control selectpicker" data-style="btn btn-link"  name="forma_pagamento_parcelado">
	                <option value="tipo">Forma de Pagamento *</option>
	                <option value="cartao_parcelado" <?=($forma_parcelado == "cartao_parcelado")?'selected':''?> >Cartão de Crédito</option>
	                <option value="boleto_parcelado" <?=($forma_parcelado == "boleto_parcelado")?'selected':''?> >Boleto Bancário</option>
	                <option value="promissoria_parcelado" <?=($forma_parcelado == "promissoria_parcelado")?'selected':''?> >Notinha Promissória</option>
	                <option value="confianca_parcelado" <?=($forma_parcelado == "confianca_parcelado")?'selected':''?> >Confiança</option>
            	</select>
      		</div>
		</div>

		<div id="mostra_icone_parcelado" class="col-sm-0" style="display: <?=($forma_parcelado == "cartao_parcelado")?'flex':'none'?>;">
			<span class="input-group-text">
				<i class="material-icons">payment</i>
			</span>
		</div>	
		<div id="mostra_cartao_parcelado" class="col-sm-5" style="display: <?=($forma_parcelado == "cartao_parcelado")?'flex':'none'?>;">
			<div class="dropdown bootstrap-select form-control form-control-sm dropup ">
              	<select class="form-control selectpicker" data-style="btn btn-link" id="cartao_pagamento_parcelado" name="cartao_pagamento_parcelado">
	                <option value="">Cartão Utilizado *</option>


		            <?php while ( $cartoes_p = $sel_cartoes_p->fetch_assoc() ) : ?>
		                <option value="<?php echo $cartoes_p['id'] ?>" <?=($cartoes_p['id'] == $cartao_utilizado_p)?'selected':''?>><?php echo $cartoes_p['titulo'] ?></option>
		            <?php endwhile; ?>

            	</select>
      		</div>
		</div>	
	</div>

	<div id="linha_parcelas_valor" class="row" style="margin-top: 25px; display: <?php echo $mostrar_parcelado; ?>;">
		<div class="col-sm-5">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="material-icons">monetization_on</i>
					</span>
				</div>
				<label for="qnt_parcelas" class="bmd-label-floating" style="
				padding-left: 55px;">Qnt Parcelas*</label>
				<input type="number" class="form-control" id="qnt_parcelas" name="qnt_parcelas" value="<?php echo $qnt_parcelas ?>">
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
				<input type="text" class="form-control" id="valor_parcelas" name="valor_parcelas" value="<?php echo $valor_parcela_format ?>">
			</div>
		</div>
	</div>

	<!-- Inicio - Botões Salvar e Cancelar -->
	<div class="row" style="margin-top: 15px; margin-left: 15px;">

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
			<a href="<?php echo $page_cadastrar_despesa ?>">
				<button type="button" class="btn btn-success">
				  	<i class="material-icons">cancel</i> Cancelar
				</button>
			</a>
		</div>
	</div>
</form>
<?php }; ?>
<?php editar_despesas(); ?>