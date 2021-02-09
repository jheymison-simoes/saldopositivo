<?php

	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando Ganhos
	include("../../routes/links.php");

	$id = $_POST['id'];

	$sql_deleta = "DELETE FROM cadastrar_cartoes WHERE id = '$id'";

	if (mysqli_query($conecta_bd, $sql_deleta)) {
	    header("Location: $cartao_deletado");
	} else {
	    header("Location: $cartao_nao_deletado");
	}

?>