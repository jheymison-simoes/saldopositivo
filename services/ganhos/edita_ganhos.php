<?php
	// Conectando banco de dadoos
	include("../../bd/conecta_bd.php");

	// Importando Links
	include("../../routes/links.php");

	// Pegando dados da página cadastrar_ganho.php
	$id = $_POST['id'];
	$date = $_POST['data'];
	$descricao = $_POST['descricao_renda'];
	$tipo_renda = $_POST['tipo_renda'];
	$valor = $_POST['valor_renda'];
	$renda_fixa = $_POST['renda_fixa'];

	// Trocando a , por . no valor para adição no banco de dados
	$valor_format = str_replace(',', '.', $valor);

	// Formatando data para inserção no banco de dados
	$data = implode('-', array_reverse(explode('/', $date)));

	// Caso renda Fixa esteja com Valor Vazio retorna a plavra Não
	if ( $renda_fixa == "" || $renda_fixa == null ) {
		$renda_fixa	= "Não";
	}

	$sql =  "UPDATE cadastrar_ganhos SET data = '$data', descricao = '$descricao', tipo_renda = '$tipo_renda', valor = '$valor_format', renda_fixa = '$renda_fixa' WHERE id = '$id'";

	if ($data == "" || $descricao == "" || $tipo_renda == "" || $valor == "") {
		header("Location: $edita_ganhos_branco&id=$id&erro_alterar=warnning");
	} else {
		if ( $conecta_bd->query($sql) === TRUE) {

		    header("Location: $ganho_editado");
		} else {
		    header("Location: $ganho_nao_editado");
		}
	}
?>