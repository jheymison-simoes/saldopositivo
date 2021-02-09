<?php

	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando Ganhos
	include("../../routes/links.php");

	$id = $_POST['id'];

	$sql_deleta = "DELETE FROM cadastrar_ganhos WHERE id = '$id'";

	if (mysqli_query($conecta_bd, $sql_deleta)) {
	    header("Location: $ganho_deletado");
	} else {
	    header("Location: $ganho_nao_deletado");
	}

?>