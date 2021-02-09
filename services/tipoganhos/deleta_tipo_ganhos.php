<?php
	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	include("../../routes/links.php");

	$id = $_POST['id'];

	$sql_deleta = "DELETE FROM tipos_de_ganhos WHERE id='{$id}' ";

	if (mysqli_query($conecta_bd, $sql_deleta)) {
	    header("Location: $tipo_ganho_deletado");
	} else {
	    header("Location: $tipo_ganho_nao_deletado");
	}
?>