<?php

    include("../../bd/conecta_bd.php"); // Importando Banco de Dados
    include("../../routes/links.php"); // Importando Links

    $id_usuario = $_POST['id_usuario'];
    $empresa = mysqli_escape_string($conecta_bd, $_POST['empresa']);
    $profissao = mysqli_escape_string($conecta_bd, $_POST['profissao']);
    $sobre = mysqli_escape_string($conecta_bd, $_POST['sobre']);
    $imagem = $_FILES['imagem_perfil'];

    // Verifica se há um arquivo e trata-o para inserção no banco de dados
    if(isset($imagem)){
        //pega os ultimos 4 cacteries do arquivo e converte para minusculo
        $extensao = strtolower(substr($imagem['name'], -4));
        //Evita nomes iguais
        $novo_nome = md5(time()) . $extensao;
        // Diretorio da imagem
        $diretorio = "assets/img/faces/";
        // Move a imagem para o diretorio
        move_uploaded_file($imagem['tmp_name'], "../../" . $diretorio . $novo_nome);
        $imagem_format = $diretorio . $novo_nome;
    }

    $sql_update = "UPDATE perfil_usuarios 
                    SET empresa = '$empresa', profissao = '$profissao', sobre = '$sobre', imagem = '$imagem_format'
                    WHERE id_cadastrar_usuarios = '$id_usuario'";

    if(mysqli_query($conecta_bd, $sql_update)){
        header("Location: ../../main.php?page=perfil&sec=vizualizar_perfil&erro_alterar=sucess");
    } else {
        header("Location: ../../main.php?page=perfil&sec=editar_perfil&erro_alterar=failed");
    }


?>