<?php
    include("../../bd/conecta_bd.php");

    $id_usuario = $_POST['id_usuario'];
    $mes = $_POST['meses'];
    $ano = $_POST['anos'];

    // Total Ganhos
    $sql_ganhos = "SELECT SUM(valor) FROM cadastrar_ganhos WHERE MONTH(data) = $mes AND YEAR(data) = $ano AND id_cadastrar_usuarios = '$id_usuario'";
	$sel_ganhos = $conecta_bd->query($sql_ganhos); // Roda SQL
	$ganhos = $sel_ganhos->fetch_assoc();

	foreach($ganhos as $ganhos){
		$valor_ganhos = $ganhos;
    }
    
    if($valor_ganhos == ""){
        $valor_ganhos = 0;
    }

    // Total Despesas Por Mês
	$sql_despesas = "SELECT SUM(valor_despesa) FROM cadastrar_despesas WHERE MONTH(data) = $mes AND YEAR(data) = $ano AND id_cadastrar_usuarios = '$id_usuario'";
	$sel_despesas = $conecta_bd->query($sql_despesas); // Roda SQL
	$despesas = $sel_despesas->fetch_assoc();

	foreach($despesas as $despesas){
		$valor_despesas = $despesas;
    }
    
    if($valor_despesas == ""){
        $valor_despesas = 0;
    }
    header("Location: ../../main.php?sec=dashboard&mes=$mes&ano=$ano&valor_ganhos=$valor_ganhos&valor_despesas=$valor_despesas");
?>