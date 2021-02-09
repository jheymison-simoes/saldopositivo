<?php
	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando links
	include("../../routes/links.php");

	// Pegando dados da página estita_tipo_de_ganhos
	$id = $_POST['id'];
	$tipo_ganhos = $_POST['tipo_ganho'];

	echo $id, $tipo_ganhos;

	$sql = "UPDATE tipos_de_ganhos SET tipo_ganho = '$tipo_ganhos' WHERE id = '$id'";

	if (empty($tipo_ganhos) || $tipo_ganhos == "") {
		header("Location: $erro_edita_tipo_ganhos_branco&id=$id&erro_alterar=warnning ");
	} else {
		if (mysqli_query($conecta_bd, $sql)) {
		    header("Location: $tipo_ganhos_editado");
		} else {
		    header("Location: $tipo_ganhos_nao_editado");
		}
	}
?>