<?php
	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando links
	include("../../routes/links.php");

	// Pegando dados da página cadastrar_ganho.php
	$id_usuario = $_POST['id_usuario'];
	$tipo_despesas = $_POST['tipo_despesa'];
	$id_adm = 100;

	// Verifica se á um valores iguais já cadastrados no banco de dados
	$sql_verifica = "SELECT * FROM tipos_de_despesas WHERE tipo_despesa = '$tipo_despesas' AND id_cadastrar_usuarios = '$id_usuario'";
	$result = mysqli_query($conecta_bd, $sql_verifica);
	$row = mysqli_num_rows($result);

	// Verifica se á um valores iguais já cadastrados no banco de dados
	$sql_verifica2 = "SELECT * FROM tipos_de_despesas WHERE tipo_despesa = '$tipo_despesas' AND id_cadastrar_usuarios = '$id_adm'";
	$result2 = mysqli_query($conecta_bd, $sql_verifica2);
	$row2 = mysqli_num_rows($result2);

	// SQL que insere na tabela de Ganhos do Banco de Dados
	$sql_cadastra_tipo_depesas = "INSERT INTO tipos_de_despesas (tipo_despesa, id_cadastrar_usuarios)
							VALUES ('$tipo_despesas', '$id_usuario')";

	// Verifica se algum dos campos digitados estão vazios
	// Caso estiver exibe uma mensagem de erro
	if ( empty($tipo_despesas) ) {
		header("Location: $erro_tipo_despesa_branco");
	} elseif ( $row > 0 || $row2 > 0 ) {
		header("Location: $erro_tipo_despesa_ja_cadastrado");
	} else {
		// Caso nenhum dos campos estiver vazio ele faz insere os dados na tabelka do Banco de Dados
		if ( mysqli_query($conecta_bd, $sql_cadastra_tipo_depesas) ) {
			// Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
			header("Location: $tipo_despesa_cadastrado");

		} else {
			// Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
			header("Location: $tipo_despesa_nao_cadastrado");
		}
	}
?>