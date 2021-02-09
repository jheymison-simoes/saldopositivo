<?php
	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando Links
	include("../../routes/links.php");

	// Pegando dados da página estita_tipo_de_ganhos
	$id = $_POST['id'];
	$tipo_despesas = $_POST['tipo_despesa'];

	$sql = "UPDATE tipos_de_despesas SET tipo_despesa = '$tipo_despesas' WHERE id = '$id'";

	if (empty($tipo_despesas) || $tipo_despesas == "") {
		header("Location: $erro_edita_tipo_despesas_branco&id=$id&erro_alterar=warnning");
	} else {
		if (mysqli_query($conecta_bd, $sql)) {
		    header("Location: $tipo_despesa_alterado");
		} else {
		    header("Location: $tipo_despesa_nao_alterado");
		}
	}
?>