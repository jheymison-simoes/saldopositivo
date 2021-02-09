<?php

    include("../../bd/conecta_bd.php"); // Importando Banco de Dados
    include("../../routes/links.php"); // Importando Links

    // Pegando valores dos inputs
    $id_usuario = $_POST['id_usuario'];
    $titulo = mysqli_escape_string($conecta_bd, $_POST['titulo_cartao']);
    $banco = mysqli_escape_string($conecta_bd,$_POST['banco']);
    $bandeira = mysqli_escape_string($conecta_bd,$_POST['bandeira']);
    $limite = mysqli_escape_string($conecta_bd,$_POST['limite']);
    $limite_disponivel = mysqli_escape_string($conecta_bd,$_POST['limite_disponivel']);

    // Formatando os valores para inserção no banco de dados
    $valor_limite_format = str_replace(',', '.', $limite);
    $valor_limite_disponivel_format = str_replace(',', '.', $limite_disponivel);

    $sql_insert = "INSERT INTO cadastrar_cartoes (titulo, banco, bandeira, limite_total, limite_disponivel, id_cadastrar_usuarios) 
                        VALUES ('$titulo', '$banco', '$bandeira', '$valor_limite_format', '$valor_limite_disponivel_format', '$id_usuario')";

    if(empty($titulo) || empty($banco) || empty($bandeira) || empty($limite) || empty($limite_disponivel)){ 
        header("Location: $erro_cadastrar_cartoes_branco");
    } else {
        if(mysqli_query($conecta_bd, $sql_insert)){
            header("Location: $cartao_cadastrado");
        } else {
            header("Location: $cartao_nao_cadastrado");
        }
    }
?>