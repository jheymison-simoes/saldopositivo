<?php

    include("../../bd/conecta_bd.php");
    include("../../routes/links.php");


    $id = $_POST['id'];

    $sql_deleta = "DELETE FROM cadastrar_metas WHERE id = '$id'";

    if(mysqli_query($conecta_bd, $sql_deleta)){
        header("Location: $metas_cadastrada");
    } else {
        header("Location: $metas_nao_cadastrada");
    }

?>