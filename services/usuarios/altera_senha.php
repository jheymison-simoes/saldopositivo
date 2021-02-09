<?php

    // Conecção com o Banco de dados
    include("../../bd/conecta_bd.php");

    // Importando links
    include("../../routes/links.php");

    $email = $_POST['email_alterar'];
    $senha = $_POST['senha_alterar'];
    $conf_senha = $_POST['altconf_senha'];

    if( $email == "" && $senha == "" && $conf_senha == "" ){
        header("Location: $erro_senha_alt_branco");

    // Verifica o email é válido
    } else if ( $email == "" || !strstr($email, '@') ) {
        header("Location: $erro_senha_alt_email_invalido");

    // Verifica se a senha é válida
    // A senha deve possui ao menos 01 Letra Maiuscula, 01 Letra Minuscula, 01 Numero e 06 Caracteres
    } else if ( $senha == "" || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{6,}$/', $senha) ) {
        header("Location: $erro_senha_alt_senha_invalida");
    
    // Verifica se as senhas conferem
    } else if ( $conf_senha == "" || $conf_senha != $senha ) {
        header("Location: $erro_senha_alt_senha_diferente");
    } else {

        // Verifica se ja exite cadastro com o email informado
        $sql_verifica_email = "SELECT email FROM cadastrar_usuarios WHERE email = '$email' ";
        $sel_verifica_email = $conecta_bd->query($sql_verifica_email);
        
        if($sel_verifica_email->num_rows){
            // Encriptando Senha
            $encript_senha = sha1($senha);

            // Faz a alteração no banco de dados
            $sql =  "UPDATE cadastrar_usuarios SET senha = '$encript_senha' WHERE email = '$email'";

            // Caso não der erro faz a inserção no banco de dados
            if ( mysqli_query($conecta_bd, $sql) ) {
                // Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
                header("Location: $senha_alterada");

            } else {
                // Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
                header("Location: $erro_senha_alterada");
            }

        } else {
            header("Location: $erro_senha_alt_email_inexistente");
        }
    }    
?>