<?php

	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando Links
	include("../../routes/links.php");

	$id = $_POST['id'];
	echo $id;

	$sql_deleta = "DELETE FROM tipos_de_despesas WHERE id='{$id}' ";

	if (mysqli_query($conecta_bd, $sql_deleta)) {
	    header("Location: $tipo_despesas_deletado");
	} else {
	    header("Location: $tipo_despesas_nao_deletado");
	}

	
?>