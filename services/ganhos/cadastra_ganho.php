<?php

	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando Links
	include("../../routes/links.php");

	// Pegando dados da página cadastrar_ganho.php
	$id_usuario = $_POST['id_usuario'];
	$date = $_POST['data'];
	$descricao = $_POST['descricao_renda'];
	$tipo_renda = $_POST['tipo_renda'];
	$valor = $_POST['valor_renda'];
	$renda_fixa = $_POST['renda_fixa'];


	// Tabela Transações
	$tipo_transacao = "Renda";
	$tipo_pagamento = "A Vista";

	// Caso renda Fixa esteja com Valor Vazio retorna a plavra Não
	if ( $renda_fixa == "" || $renda_fixa == null ) {
		$renda_fixa	= "Não";
	} 

	// Trocando a , por . no valor para adição no banco de dados
	$valor_format = str_replace(',', '.', $valor);


	// Se renda Fixa for marcado ele adicionará a renda por 12 Meses consecutivos
	if( $renda_fixa == "Sim" ){
		$data = date($date);

		// Explode a barra e retorna três arrays
		$partes = explode("-", $data);
		$ano = $partes[0];
		$mes = $partes[1];
		$dia = $partes[2];

		for($i = 0; $i < 12; $i++){
			$data_format = "$ano-$mes-$dia";

			$sql_cadastra_ganhos = "INSERT INTO cadastrar_ganhos (data, descricao, tipo_renda, valor, renda_fixa, id_cadastrar_usuarios)
									VALUES ('$data_format', '$descricao', '$tipo_renda', '$valor_format', '$renda_fixa', '$id_usuario')";

			if ( $data == "" || $descricao == "" || $tipo_renda == "" || $valor == "") {
					header("Location: $erro_cadastro_ganhos_branco");

			} else {
				// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
				if ( mysqli_query($conecta_bd, $sql_cadastra_ganhos) ) {
					// Sqlr que cadastra na Tabela Transações
					$sql_transacoes = "INSERT INTO transacoes (data, descricao, tipo_transacao, tipo_pagamento, valor, id_cadastrar_usuarios)
										VALUES ('$data_format', '$descricao', '$tipo_transacao', '$tipo_pagamento', '$valor_format', '$id_usuario')";

					mysqli_query($conecta_bd, $sql_transacoes);
					// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
					header("Location: $ganho_cadastrado");
				} else {
					// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
					header("Location: $ganho_nao_cadastrado");
				}
			}
			
			echo "$sql_cadastra_ganhos<br>";
			$mes++;
			if($mes > 12){
				$mes = 1;
				$ano = $ano+1;
			}
		}

	// Se a Renda Fixa não for marcado será adicionado apenas uma vez
	} else {
		// Formatando a Data para o Padrão do BD
		$data = implode('-', array_reverse(explode('/', $date)));

		// Inserindo os dados
		$sql_cadastra_ganhos = "INSERT INTO cadastrar_ganhos (data, descricao, tipo_renda, valor, renda_fixa, id_cadastrar_usuarios)
								VALUES ('$data', '$descricao', '$tipo_renda', '$valor_format', '$renda_fixa', '$id_usuario')";

		// Verificado erros
		if ( $data == "" || $descricao == "" || $tipo_renda == "" || $valor == "") {
				header("Location: $erro_cadastro_ganhos_branco");
		} else {
			// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
			if ( mysqli_query($conecta_bd, $sql_cadastra_ganhos) ) {
				$sql_transacoes = "INSERT INTO transacoes (data, descricao, tipo_transacao, tipo_pagamento, valor, id_cadastrar_usuarios)
										VALUES ('$data', '$descricao', '$tipo_transacao', '$tipo_pagamento', '$valor_format', '$id_usuario')";

				mysqli_query($conecta_bd, $sql_transacoes);

				// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
				header("Location: $ganho_cadastrado");
			} else {
				// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
				header("Location: $ganho_nao_cadastrado");
			}
		}
	}
?>