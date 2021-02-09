<?php

	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando Links
	include("../../routes/links.php");

	// Pegando dados da página edita_despesa.php
	$id = $_POST['id'];
	$date = $_POST['data'];
	$descricao = $_POST['descricao_despesa'];
	$tipo_despesa = $_POST['tipo_despesa'];
	$tipo_pagamento = $_POST['tipo_pagamento'];
	$despesa_fixa = $_POST['despesa_fixa'];

	// Formatando data para inserção no banco de dados
	$data = implode('-', array_reverse(explode('/', $date)));

	// Caso renda Fixa esteja com Valor Vazio retorna a plavra Não
	if ( $despesa_fixa == "" || $despesa_fixa == null ) {
		$despesa_fixa	= "Não";
	} 

	// Se Tipo de Pagamento for a Vista ele pega somente os valores de A Vista
	if( $tipo_pagamento == "a_vista" ){
		$forma_pagamento_vista = $_POST['forma_pagamento_vista'];

		if( $forma_pagamento_vista == "cartao_vista"){
			$cartao_pagamento_vista = $_POST['cartao_pagamento_vista'];
		}

		$valor_despesa = $_POST['valor_despesa'];
		$valor_despesa_format = str_replace(',', '.', $valor_despesa);

	} elseif ( $tipo_pagamento == "parcelado" ) {
		$forma_pagamento_parcelado = $_POST['forma_pagamento_parcelado'];

		if ($forma_pagamento_parcelado == "cartao_parcelado") {
			$cartao_pagamento_parcelado = $_POST['cartao_pagamento_parcelado'];
		}
		
		$qnt_parcelas = $_POST['qnt_parcelas'];
		$valor_parcelas = $_POST['valor_parcelas'];
		$valor_parcelas_format = str_replace(',', '.', $valor_parcelas);
	}

	// Altera a tabela cadastrar_despesas
	$sql_altera_despesa = "UPDATE cadastrar_despesas SET data = '$data', descricao = '$descricao', tipo_despesa = '$tipo_despesa', tipo_pagamento = '$tipo_pagamento', despesa_fixa = '$despesa_fixa' WHERE id = '$id'";

	// Altera a tabela pagamentos_a_vista
	$sql_altera_pg_vista = "UPDATE pagamentos_a_vista SET forma_pagamento = '$forma_pagamento_vista', valor_despesa = '$valor_despesa_format' WHERE id_cadastrar_despesas = '$id'";

	// Altera a tabela cartoes_avista
	$sql_altera_cartao_vista = "UPDATE cartoes_avista SET id_cadastrar_cartoes = '$cartao_pagamento_vista', WHERE id_cadastrar_despesas = '$id'";

	// Insere na Table cartoes_avista
	$sql_insere_cartao_vista = "INSERT INTO cartoes_avista (id_cadastrar_cartoes, id_cadastrar_despesas) VALUES ('$cartao_pagamento_vista', '$id')";

	// Deleta na tabela cartoes_avista
	$sql_deleta_cartao_vista = "DELETE FROM cartoes_avista WHERE id_cadastrar_despesas = '$id'";

	// Altera na tabela pagamentos_parcelados
	$sql_altera_pg_parcelado = "UPDATE pagamentos_parcelados SET forma_pagamento = '$forma_pagamento_parcelado', qnt_parcelas = '$qnt_parcelas', valor_parcela = '$valor_parcelas_format' WHERE id_cadastrar_despesas = '$id'";

	// Deleta cartoes Parcelados
	$sql_deleta_cartao_parcelado = "DELETE FROM cartoes_parcelados WHERE id_cadastrar_despesas = '$id'";

	// Insere cartoes parcelados
	$sql_insere_cartao_parcelado = "INSERT INTO cartoes_parcelados (id_cadastrar_cartoes, id_cadastrar_despesas) VALUES ('$cartao_pagamento_parcelado','$id')";

	// Para pagamentos a vista
	if($tipo_pagamento == "a_vista" && $forma_pagamento_vista != "cartao_vista"){
		if(empty($data) || empty($descricao) || empty($tipo_despesa) || empty($tipo_pagamento) || empty($forma_pagamento_vista) || empty($valor_despesa_format)){
			header("Location: $erro_edita_despesas_branco$id&erro=branco");
		} else {
			if ( mysqli_query($conecta_bd, $sql_altera_despesa) ) {
				mysqli_query($conecta_bd, $sql_altera_pg_vista); // Altera pagamento a vista
				mysqli_query($conecta_bd, $sql_deleta_cartao_vista); // Deleta cartoes_avista
				header("Location: $despesa_editada");
			} else {
				header("Location: $despesa_nao_editada");
			}
		}
	} else if($tipo_pagamento == "a_vista" && $forma_pagamento_vista == "cartao_vista") {
		if(empty($data) || empty($descricao) || empty($tipo_despesa) || empty($tipo_pagamento) || empty($forma_pagamento_vista) || empty($cartao_pagamento_vista) ||  empty($valor_despesa_format)){
			header("Location: $erro_edita_despesas_branco$id&erro=branco");
		} else {
			if ( mysqli_query($conecta_bd, $sql_altera_despesa) ) {
				mysqli_query($conecta_bd, $sql_altera_pg_vista); // Altera pagamento a vista
				mysqli_query($conecta_bd, $sql_deleta_cartao_vista); // Deleta cartoes_avista
				mysqli_query($conecta_bd, $sql_insere_cartao_vista); // Insere cartoes_avista
				header("Location: $despesa_editada");
			} else {
				header("Location: $despesa_nao_editada");
			}
		}
	}

	// Para pagamentos Parcelados
	if($tipo_pagamento == "parcelado" && $forma_pagamento_parcelado != "cartao_parcelado"){
		if(empty($data) || empty($descricao) || empty($tipo_despesa) || empty($tipo_pagamento) || empty($forma_pagamento_parcelado) || empty($valor_parcelas_format)){
			header("Location: $erro_edita_despesas_branco$id&erro=branco");
		} else {
			if ( mysqli_query($conecta_bd, $sql_altera_despesa) ) {
				mysqli_query($conecta_bd, $sql_altera_pg_parcelado); // Altera pagamento a vista
				mysqli_query($conecta_bd, $sql_deleta_cartao_parcelado); // Deleta cartoes_avista
				header("Location: $despesa_editada");
			} else {
				header("Location: $despesa_nao_editada");
			}
		}
	} else if($tipo_pagamento == "parcelado" && $forma_pagamento_parcelado == "cartao_parcelado"){
		if(empty($data) || empty($descricao) || empty($tipo_despesa) || empty($tipo_pagamento) ||  empty($cartao_pagamento_parcelado) || empty($forma_pagamento_parcelado) || empty($valor_parcelas_format)){
			header("Location: $erro_edita_despesas_branco$id&erro=branco");
		} else {
			if ( mysqli_query($conecta_bd, $sql_altera_despesa) ) {
				mysqli_query($conecta_bd, $sql_altera_pg_parcelado); // Altera pagamento a vista
				mysqli_query($conecta_bd, $sql_deleta_cartao_parcelado);
				mysqli_query($conecta_bd, $sql_insere_cartao_parcelado);
				header("Location: $despesa_editada");
			} else {
				header("Location: $despesa_nao_editada");
			}
		}
	}

?>