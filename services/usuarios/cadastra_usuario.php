<?php

    // Conecção com o banco de dados
    include("../../bd/conecta_bd.php");

    // Importando links
    include("../../routes/links.php");

    $nome = $_POST['nome_cadastrar'];
    $email = $_POST['email_cadastrar'];
    $senha = ($_POST['senha_cadastrar']);
    $conf_senha = $_POST['conf_senha'];

    // Dados do Perfil
    $empresa = "Editar(Opcional)";
    $profissao = "Editar(Opcional)";
    $sobre = "Editar(Opcional)";
    $imagem = "assets/img/faces/avatar.jpg";

    // Verifica se ja exite cadastro com o email informado
    $sql_verifica_cadastro = "SELECT email FROM cadastrar_usuarios WHERE email = '$email' ";
    $sel_verifica_cadastro = $conecta_bd->query($sql_verifica_cadastro);

    // Caso exista será redirecionado para uma página para inbformando que ja existe cadastro
    if($sel_verifica_cadastro->num_rows){
        header("Location: $page_contem_cadastro_usuario");

    // Caso não existe verificará os erros e fará o cadastro
    } else {
        // Verifica se os campos estão em branco
        if($nome == "" && $email == "" && $senha == "" && $conf_senha == "" ){
            header("Location: $erro_cadastro_branco");

        // Verifica se digitou o sobrenome
        } else if( $nome == "" || !strstr($nome, ' ') ) {
            header("Location: $erro_cadastro_sem_sobrenome");

        // Verifica o email é válido
        } else if ( $email == "" || !strstr($email, '@') ) {
            header("Location: $erro_cadastro_email_invalido");

        // Verifica se a senha é válida
        // A senha deve possui ao menos 01 Letra Maiuscula, 01 Letra Minuscula, 01 Numero e 06 Caracteres
        } else if ( $senha == "" || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{6,}$/', $senha) ) {
            header("Location: $erro_cadastro_senha_invalida");
        
        // Verifica se as senhas conferem
        } else if ( $conf_senha == "" || $conf_senha != $senha ) {
            header("Location: $erro_cadastro_senha_diferente");
        } else {

            // Encriptando Senha
            $encript_senha = sha1($senha);

            // Faz a inserção no banco de dados
            $sql = "INSERT INTO cadastrar_usuarios (nome, email, senha) VALUES ('$nome', '$email', '$encript_senha')";
            
            // Caso não der erro faz a inserção no banco de dados teste
            if ( mysqli_query($conecta_bd, $sql) ) {

                $sql_ultimo = "SELECT id FROM cadastrar_usuarios ORDER BY id DESC LIMIT 1";
                $sel_ultimo = $conecta_bd->query($sql_ultimo);
                $ultimo_id = $sel_ultimo->fetch_assoc();

                foreach($ultimo_id as $ultimo_id){
                    $id_usuario = $ultimo_id;
                }

                $sql_perfil = "INSERT INTO perfil_usuarios (empresa, profissao, sobre, imagem, id_cadastrar_usuarios) 
                                VALUES ('$empresa', '$profissao', '$sobre', '$imagem', '$id_usuario')";
                
                mysqli_query($conecta_bd, $sql_perfil);
                
                // Informa mensagem de sucesso caso os dados forem corretamente inseridos no Banco de Dados
                header("Location: $page_confirma_cadastro_usuario");

            } else {
                // Informa mensagem de erro caso os dados não forem corretamente inseridos no Banco de Dados
                header("Location: $serv_cadastro_nao_realizado");
            }
        }

    }

?>