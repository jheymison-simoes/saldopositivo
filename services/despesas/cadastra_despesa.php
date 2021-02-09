<?php

	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando links
	include("../../routes/links.php");

	// Pegando dados da página cadastrar_despesa.php
	$id_usuario = $_POST['id_usuario'];
	$date = $_POST['data'];
	$descricao = $_POST['descricao_despesa'];
	$tipo_despesa = $_POST['tipo_despesa'];
	$tipo_pagamento = $_POST['tipo_pagamento'];
	$despesa_fixa = $_POST['despesa_fixa'];

	// Tabela Transações
	$tipo_transacao = "Despesa";


	// Caso renda Fixa esteja com Valor Vazio retorna a plavra Não
	if ( $despesa_fixa == "" || $despesa_fixa == null ) {
		$despesa_fixa = "Não";
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

	// Se renda Fixa for marcado ele adicionará a renda por 12 Meses consecutivos
	if( $despesa_fixa == "Sim" ){
		$data = date($date);

		// Explode a barra e retorna três arrays
		$partes = explode("-", $data);
		$ano = $partes[0];
		$mes = $partes[1];
		$dia = $partes[2];

		for($i = 0; $i < 12; $i++){
			$data_format = "$ano-$mes-$dia";

			$sql_cadastra_despesas = "INSERT INTO cadastrar_despesas (data, descricao, tipo_despesa, tipo_pagamento, despesa_fixa, valor_despesa, id_cadastrar_usuarios) VALUES ('$data_format', '$descricao', '$tipo_despesa', '$tipo_pagamento', '$despesa_fixa', '$valor_despesa_format', '$id_usuario')";

			// Verificado erros
			if ( $data == "" || $descricao == "" || $tipo_despesa == "" || $tipo_pagamento == "") {
					header("Location: $erro_cadastro_despesa_branco");

			} else {
				// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
				if ( mysqli_query($conecta_bd, $sql_cadastra_despesas) ) {
					$sql_transacoes = "INSERT INTO transacoes (data, descricao, tipo_transacao, tipo_pagamento, valor, id_cadastrar_usuarios)
										VALUES ('$data_format', '$descricao', '$tipo_transacao', '$tipo_pagamento', '$valor_despesa_format', '$id_usuario')";

					mysqli_query($conecta_bd, $sql_transacoes);

					// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
					header("Location: $despesa_cadastrada");
				} else {
					// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
					header("Location: $despesa_nao_cadastrada");
				}
			}
			
			$mes++;
			if($mes > 12){
				$mes = 1;
				$ano = $ano+1;
			}
		
			if( $tipo_pagamento == "a_vista" ){
				// Inicio - Pega o ID da ultima despesa Cadastrada

				$sql_ultima_depesa = "SELECT id FROM cadastrar_despesas ORDER BY id DESC LIMIT 1";

				$sel_ultima_despesa = $conecta_bd->query($sql_ultima_depesa);

				$id_ultima_despesa = $sel_ultima_despesa->fetch_assoc();

				foreach($id_ultima_despesa as $id_ultima_despesa){

					$id_despesa = $id_ultima_despesa;

				}

				// Fim

				// Insere na Tabela pagamentos_a_vista
				$sql_pagamento_vista = "INSERT INTO pagamentos_a_vista (forma_pagamento, id_cadastrar_despesas, id_cadastrar_usuarios) VALUES ('$forma_pagamento_vista', '$id_despesa', '$id_usuario')";
				// Faz a inserção dos dados no banco de dados
				$sel_pagamento_vista = $conecta_bd->query($sql_pagamento_vista);

				// Se o pagamento for realziado com ca~rtão insere na tabela cartoes_avista
				if( $forma_pagamento_vista == "cartao_vista" ){
					// Insere na tabela cartao_avista
					$sql_cartoes_vista = "INSERT INTO cartoes_avista (id_cadastrar_cartoes, id_cadastrar_despesas, id_cadastrar_usuarios)
										VALUES ('$cartao_pagamento_vista','$id_despesa', '$id_usuario')";

					// Faz a inserção dos dados no banco de dados
					$sel_cartoes_vista = $conecta_bd->query($sql_cartoes_vista);
				}
			} else if ( $tipo_pagamento == "parcelado" ) {
				header("Location: $erro_despesa_parcelado_nao_aceito");
			}
		}
	} else {
		
		// Se for pagamento a vista insere dados na tabela pagamento_a_vista
		if( $tipo_pagamento == "a_vista" ){
			// Formatando a Data para o Padrão do BD
			$data = implode('-', array_reverse(explode('/', $date)));

			// Cadastrando na Tabela cadastrar_despesas
			$sql_cadastra_despesas = "INSERT INTO cadastrar_despesas (data, descricao, tipo_despesa, tipo_pagamento, despesa_fixa, valor_despesa,  id_cadastrar_usuarios) VALUES ('$data', '$descricao', '$tipo_despesa', '$tipo_pagamento', '$despesa_fixa', '$valor_despesa_format', '$id_usuario')";

			// Verificado erros
			if ( $data == "" || $descricao == "" || $tipo_despesa == "" || $tipo_pagamento == "") {
					header("Location: $despesa_nao_cadastrada");

			} else {
				// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
				if ( mysqli_query($conecta_bd, $sql_cadastra_despesas) ) {
					$sql_transacoes = "INSERT INTO transacoes (data, descricao, tipo_transacao, tipo_pagamento, valor, id_cadastrar_usuarios)
										VALUES ('$data', '$descricao', '$tipo_transacao', '$tipo_pagamento', '$valor_despesa_format', '$id_usuario')";

					mysqli_query($conecta_bd, $sql_transacoes);
					// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
					header("Location:  $despesa_cadastrada");

				} else {
					// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
					header("Location: $despesa_nao_cadastrada");

				}
			}

			// Inicio - Pega o ID da ultima despesa Cadastrada

			$sql_ultima_depesa = "SELECT id FROM cadastrar_despesas ORDER BY id DESC LIMIT 1";

			$sel_ultima_despesa = $conecta_bd->query($sql_ultima_depesa);

			$id_ultima_despesa = $sel_ultima_despesa->fetch_assoc();

			foreach($id_ultima_despesa as $id_ultima_despesa){

				$id_despesa = $id_ultima_despesa;

			}
			// Fim

			// Insere na Tabela pagamentos_a_vista
			$sql_pagamento_vista = "INSERT INTO pagamentos_a_vista (forma_pagamento, id_cadastrar_despesas, id_cadastrar_usuarios) VALUES ('$forma_pagamento_vista', '$id_despesa', '$id_usuario')";
			// Faz a inserção dos dados no banco de dados
			$sel_pagamento_vista = $conecta_bd->query($sql_pagamento_vista);

			// Se o pagamento for realziado com ca~rtão insere na tabela cartoes_avista
			if( $forma_pagamento_vista == "cartao_vista" ){
				// Insere na tabela cartao_avista
				$sql_cartoes_vista = "INSERT INTO cartoes_avista (id_cadastrar_cartoes, id_cadastrar_despesas, id_cadastrar_usuarios)
									VALUES ('$cartao_pagamento_vista', '$id_despesa', '$id_usuario')";

				// Faz a inserção dos dados no banco de dados
				$sel_cartoes_vista = $conecta_bd->query($sql_cartoes_vista);
			}
		} else if ( $tipo_pagamento == "parcelado" ){
			$data = date($date);

			// Explode a barra e retorna três arrays
			$partes = explode("-", $data);
			$ano = $partes[0];
			$mes = $partes[1];
			$dia = $partes[2];

			for($i = 0; $i < $qnt_parcelas; $i++){
				$data_format = "$ano-$mes-$dia";

				$sql_cadastra_despesas = "INSERT INTO cadastrar_despesas (data, descricao, tipo_despesa, tipo_pagamento, despesa_fixa, valor_despesa, id_cadastrar_usuarios) VALUES ('$data_format', '$descricao', '$tipo_despesa', '$tipo_pagamento', '$despesa_fixa', '$valor_parcelas_format', '$id_usuario')";

				// Verificado erros
				if ( $data == "" || $descricao == "" || $tipo_despesa == "" || $tipo_pagamento == "") {
						header("Location: $erro_cadastro_despesa_branco");

				} else {
					// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
					if ( mysqli_query($conecta_bd, $sql_cadastra_despesas) ) {
						$sql_transacoes = "INSERT INTO transacoes (data, descricao, tipo_transacao, tipo_pagamento, valor, id_cadastrar_usuarios)
											VALUES ('$data_format', '$descricao', '$tipo_transacao', '$tipo_pagamento', '$valor_parcelas_format', '$id_usuario')";

						mysqli_query($conecta_bd, $sql_transacoes);

						// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
						header("Location: $despesa_cadastrada");
					} else {
						// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
						header("Location: $despesa_nao_cadastrada");
					}
				}
				
				// Se o pagamento for realziado com cartão insere na tabela cartoes_parcelado
				if( $forma_pagamento_parcelado == "cartao_parcelado" ){
					
					// Inicio - Pega o ID da ultima despesa Cadastrada
					$sql_ultima_depesa = "SELECT id FROM cadastrar_despesas ORDER BY id DESC LIMIT 1";

					$sel_ultima_despesa = $conecta_bd->query($sql_ultima_depesa);

					$id_ultima_despesa = $sel_ultima_despesa->fetch_assoc();

					foreach($id_ultima_despesa as $id_ultima_despesa){

						$id_despesa = $id_ultima_despesa;

					}

					// Insere na tabela cartao_parcelado
					$sql_cartoes_parcelado = "INSERT INTO cartoes_parcelados (id_cadastrar_cartoes, id_cadastrar_despesas, id_cadastrar_usuarios)
										VALUES ('$cartao_pagamento_parcelado','$id_despesa', '$id_usuario')";

					// Faz a inserção dos dados no banco de dados
					$sel_cartoes_parcelado = $conecta_bd->query($sql_cartoes_parcelado);
				}

				// Inicio - Pega o ID da ultima despesa Cadastrada
				$sql_ultima_depesa = "SELECT id FROM cadastrar_despesas ORDER BY id DESC LIMIT 1";

				$sel_ultima_despesa = $conecta_bd->query($sql_ultima_depesa);

				$id_ultima_despesa = $sel_ultima_despesa->fetch_assoc();

				foreach($id_ultima_despesa as $id_ultima_despesa){

					$id_despesa = $id_ultima_despesa;

				}							

				$sql_pagamento_parcelado = "INSERT INTO pagamentos_parcelados (forma_pagamento, qnt_parcelas, id_cadastrar_despesas, id_cadastrar_usuarios)	VALUES ('$forma_pagamento_parcelado', '$qnt_parcelas', '$id_despesa', '$id_usuario')";
				
				$conecta_bd->query($sql_pagamento_parcelado);

				$mes++;
				if($mes > 12){
					$mes = 1;
					$ano = $ano+1;
				}
			}
		}
	}

?>