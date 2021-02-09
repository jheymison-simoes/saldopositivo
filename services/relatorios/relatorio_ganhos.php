<?php

    include("../../bd/conecta_bd.php"); // Importando Banco de Dados
    include("../../routes/links.php"); // Importando Links

    $id_usuario = $_POST['id_usuario'];

    // Tipo data Mensal
    $get_mes = $_POST['select_data_ganhos_mes'];
    $get_ano = $_POST['select_data_ganhos_ano'];

    // Tipo data Período
    $get_periodo1 = $_POST['date_periodo_1'];
    $get_periodo2 = $_POST['date_periodo_2'];
    // Formatando data para o banco de dados
    $data_periodo1 = implode('-', array_reverse(explode('/', $get_periodo1)));
    $data_periodo2 = implode('-', array_reverse(explode('/', $get_periodo2)));

    // Tipo data especifica
    $get_day = $_POST['date_especifico'];
    // Formatando data para o banco de dados
    $data_day = implode('-', array_reverse(explode('/', $get_day)));

    // Por Tipo de Renda
    $get_type_renda = $_POST['tipo_renda'];

    // Por Valores
    $get_type_select = $_POST['type_valores'];
    $get_valor = $_POST['type_valores_input'];
    $valor = str_replace(',', '.', $get_valor);

    // Por Data - Mensal, Período e Dia Especifico
    if($get_mes != "" && $get_ano != ""){
        header("Location: ../../main.php?page=relatorios&sec=relatorio_ganhos&mes=$get_mes&ano=$get_ano");
    } else if($get_periodo1 != "" && $get_periodo2 != ""){
        header("Location: ../../main.php?page=relatorios&sec=relatorio_ganhos&date1=$data_periodo1&date2=$data_periodo2");
    } else if($get_day != ""){
        header("Location: ../../main.php?page=relatorios&sec=relatorio_ganhos&date=$data_day");
    } else if($get_type_renda != 0) {
        header("Location: ../../main.php?page=relatorios&sec=relatorio_ganhos&type_renda=$get_type_renda");
    } else if($get_valor != "") {
        header("Location: ../../main.php?page=relatorios&sec=relatorio_ganhos&type=$get_type_select&valor=$valor");
    }
    
?>