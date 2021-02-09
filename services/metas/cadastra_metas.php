<?php

    include("../../bd/conecta_bd.php");
    include("../../routes/links.php");

    $id_usuario = mysqli_escape_string($conecta_bd, $_POST['id_usuario']);
    $data = date('Y-m-d');
    $tipo_meta = mysqli_escape_string($conecta_bd, $_POST['tipo_meta']);
    $descricao = mysqli_escape_string($conecta_bd, $_POST['descricao']);
    $valor_meta = mysqli_escape_string($conecta_bd, $_POST['valor_meta']);

    // Formatando os valores para inserção no banco de dados
    $valor_meta_format = str_replace(',', '.', $valor_meta);

    echo $id_usuario . "<br>";
    echo $data . "<br>";
    echo $tipo_meta . "<br>";
    echo $descricao . "<br>";
    echo $valor_meta_format . "<br>";

    $sql_insert = "INSERT INTO cadastrar_metas (data, tipo_meta, descricao, valor_meta, id_cadastrar_usuarios) 
                        VALUES ('$data', '$tipo_meta', '$descricao', '$valor_meta', '$id_usuario')";

    echo $sql_insert;

    if(empty($tipo_meta) || empty($descricao) || empty($valor_meta_format)){ 
        header("Location: $erro_metas_branco");
    } else {
        if(mysqli_query($conecta_bd, $sql_insert)){
            header("Location: $metas_cadastrada");
        } else {
            header("Location: $metas_nao_cadastrada");
        }
    }
?>