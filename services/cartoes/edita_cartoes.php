<?php

    include("../../bd/conecta_bd.php"); // Importando Banco de Dados
    include("../../routes/links.php"); // Importando Links

    // Pegando valores dos inputs
    $id = $_POST['id'];
    $titulo = mysqli_escape_string($conecta_bd, $_POST['titulo_cartao']);
    $banco = mysqli_escape_string($conecta_bd,$_POST['banco']);
    $bandeira = mysqli_escape_string($conecta_bd,$_POST['bandeira']);
    $limite = mysqli_escape_string($conecta_bd,$_POST['limite']);
    $limite_disponivel = mysqli_escape_string($conecta_bd,$_POST['limite_disponivel']);

    // Formatando os valores para inserção no banco de dados
    $valor_limite_format = str_replace(',', '.', $limite);
    $valor_limite_disponivel_format = str_replace(',', '.', $limite_disponivel);

    $sql_update = "UPDATE cadastrar_cartoes SET titulo = '$titulo', banco = '$banco', bandeira = '$bandeira', limite_total = '$valor_limite_format', limite_disponivel = '$valor_limite_disponivel_format' WHERE id = '$id'";

    if(empty($titulo) || empty($banco) || empty($bandeira) || empty($limite) || empty($limite_disponivel)){ 
        header("Location: $erro_edita_cartoes_branco&id=$id&erro_alterar=warnning");
    } else {
        if(mysqli_query($conecta_bd, $sql_update)){
            header("Location: $cartao_cadastrado");
        } else {
            header("Location: $cartao_nao_cadastrado");
        }
    }
?>