<?php

	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando Ganhos
	include("../../routes/links.php");

	$id = $_POST['id'];

    $sql_deleta = "DELETE FROM cadastrar_despesas WHERE id = '$id';";
    $sql_deleta .= "DELETE FROM pagamentos_a_vista WHERE id_cadastrar_despesas = '$id';";
    $sql_deleta .= "DELETE FROM pagamentos_parcelados WHERE id_cadastrar_despesas = '$id';";
    $sql_deleta .= "DELETE FROM cartoes_avista WHERE id_cadastrar_despesas = '$id';";
    $sql_deleta .= "DELETE FROM cartoes_parcelados WHERE id_cadastrar_despesas = '$id'";

	if ($conecta_bd->multi_query($sql_deleta)) {
	    header("Location: $despesa_deletada");
	} else {
        header("Location: $despesa_nao_deletada");
	}

?>