<?php
    session_start();

    // Conecção com o Banco de Dados
    include("../../bd/conecta_bd.php");

    // Importando links
    include("../../routes/links.php");

    $email = $_POST['email_logar'];
    $senha = $_POST['senha_logar'];

    // Verifica se os campos estão em branco
    if($email == "" && $senha == ""){
        header("Location: $erro_login_branco");

    // Verifica se digitou o sobrenome
    } else if ( $email == "" || !strstr($email, '@') ) {
        header("Location: $erro_login_email_invalido");

    // Verifica se a senha é válida
    // A senha deve possui ao menos 01 Letra Maiuscula, 01 Letra Minuscula, 01 Numero e 06 Caracteres
    } else if ( $senha == "" || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{6,}$/', $senha) ) {
        header("Location: $erro_login_senha_invalida");
    
    } else {

        $cript_senha = sha1($senha);

        // Verificando se está cadastrado
        $sql = "SELECT * FROM cadastrar_usuarios WHERE email = '$email' AND senha = '$cript_senha'";
        $sel = $conecta_bd->query($sql);

        // Caso exista entra no site
        if($sel->num_rows){

            $usuario = $sel->fetch_assoc();

            $_SESSION['logado'] = true;
            $_SESSION['user'] = $usuario;
            header("Location: $login_realizado");

        } else {
            header("Location: $erro_login_nao_realizado");
        }
    }

    
?>