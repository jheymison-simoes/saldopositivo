<?php

	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando Links
	include("../../routes/links.php");

	// Pegando dados da página cadastrar_ganho.php
	$id_usuario = $_POST['id_usuario'];
	$tipo_ganhos = $_POST['tipo_ganho'];

	// Verifica se á um valores iguais já cadastrados no banco de dados
	$sql_verifica = "SELECT * FROM tipos_de_ganhos WHERE tipo_ganho = '$tipo_ganhos' AND id_cadastrar_usuarios = '$id_usuario'";
	$result = mysqli_query($conecta_bd, $sql_verifica);
	$row = mysqli_num_rows($result);

	// Verifica se á um valores iguais já cadastrados no banco de dados
	$sql_verifica2 = "SELECT * FROM tipos_de_ganhos WHERE tipo_ganho = '$tipo_ganhos' AND id_cadastrar_usuarios = '$id_adm'";
	$result2 = mysqli_query($conecta_bd, $sql_verifica2);
	$row2 = mysqli_num_rows($result2);

	// SQL que insere na tabela de Ganhos do Banco de Dados

	$sql_cadastra_tipo_ganhos = "INSERT INTO tipos_de_ganhos (tipo_ganho, id_cadastrar_usuarios)
							        VALUES ('$tipo_ganhos', '$id_usuario')";

	// Verifica se algum dos campos digitados estão vazios
	// Caso estiver exibe uma mensagem de erro
	if ( empty($tipo_ganhos) || $tipo_ganhos == "") {
		header("Location: $erro_tipo_ganho_branco");
	} elseif ( $row > 0 || $row2 > 0 ) {
		header("Location: $erro_tipo_ganho_ja_cadastrado");
	} else {
		// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
		if ( mysqli_query($conecta_bd, $sql_cadastra_tipo_ganhos) ) {
			// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
			header("Location: $tipo_ganhos_cadastrado");

		} else {
			// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
			header("Location: $tipo_ganhos_nao_cadastrado");
		}
	}
?>