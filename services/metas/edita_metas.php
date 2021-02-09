<?php

    include("../../bd/conecta_bd.php");
    include("../../routes/links.php");

    $id_usuario = $_POST['id_usuario'];
    $id = $_POST['id'];
    $tipo_meta = mysqli_escape_string($conecta_bd, $_POST['tipo_meta']);
    $descricao = mysqli_escape_string($conecta_bd, $_POST['descricao']);
    $valor_meta = mysqli_escape_string($conecta_bd, $_POST['valor_meta']);

    // Formatando os valores para inserção no banco de dados
    $valor_meta_format = str_replace(',', '.', $valor_meta);

    $sql_update = "UPDATE cadastrar_metas SET tipo_meta = '$tipo_meta', descricao = '$descricao', valor_meta = '$valor_meta_format' WHERE id = '$id'";

    echo $sql_update;

    if(empty($tipo_meta) || empty($descricao) || empty($valor_meta_format)){ 
        header("Location: $erro_editar_metas_branco&id=$id&erro_alterar=warnning");
    } else {
        if(mysqli_query($conecta_bd, $sql_update)){
            header("Location: $metas_cadastrada");
        } else {
            header("Location: $metas_nao_cadastrada");
        }
    }
?>